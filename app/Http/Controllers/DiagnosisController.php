<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use Illuminate\Http\Request;
use DB;
use App\Models\Symptom;
use App\Models\Visitor;
use App\Models\Diagsymp;
use stdClass;
use Session;

class DiagnosisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $symptoms = DB::table('symptoms')
                    ->orderBy('code')
                    ->get();

        if(count($symptoms) == 0) {
            return view('diagnosis.index')->with(Session::flash('alert_notready', 'Sistem akan siap beberapa saat lagi!'));;
        }
        else {
            return view('diagnosis.index', compact('symptoms'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $get_visitor = Visitor::where('name', $request->name)
                                ->where('nik', $request->nik)
                                ->where('telephone', $request->telephone)
                                ->get();

        if(count($get_visitor) == 0){
            $visitor = new Visitor;
            $visitor->name = ucwords(strtolower($request->name));
            $visitor->nik = $request->nik;
            $visitor->gender = $request->jenisKelamin;
            $visitor->telephone = $request->telephone;
            $visitor->address = ucwords(strtolower($request->address));
            $visitor->save();

            $visitor_id = $visitor->id;
        }
        else{
            $visitor_id = $get_visitor[0]->id;
        }        

        $score = $this->case_base_reasoning($request->symptom);

        $diagnosis = new Diagnosis;
        $diagnosis->visitor_id = $visitor_id;
        $diagnosis->score = $score;
        $diagnosis->save();

        foreach ($request->symptom as $symptom) {
            $diagsymp = new Diagsymp;
            $diagsymp->symptom_id = $symptom;
            $diagsymp->diagnosis_id = $diagnosis->id;
            $diagsymp->save();
        }

        return $this->show_diagnosis($request, $score);
    }

    private function calculate_total_weight(){
        $total_weight = 0;

        $symptoms = Symptom::get('weight');

        foreach ($symptoms as $symptom) {
            $total_weight += $symptom->weight;
        }

        return $total_weight;
    }

    private function calculate_weight($symptoms){
        $weight = [];

        foreach ($symptoms as $symptom) {
            array_push($weight, Symptom::where('id', $symptom)->get('weight')[0]->weight);
        }

        return array_sum($weight);
    }

    private function show_diagnosis($request, $score){
        $symptoms = [];

        foreach ($request->symptom as $symptom) {
            $object = new stdClass();
            $object->symptom = Symptom::where('id', $symptom)->get()[0]->symptom;
            $object->treatment = Symptom::where('id', $symptom)->get()[0]->treatment;

            array_push($symptoms, $object);
        }
        
        $data = array(
            'symptoms' => $symptoms,
            'score' => $score,
            'name' => ucwords(strtolower($request->name)),
            'nik' => $request->nik,
            'gender' => $request->jenisKelamin,
            'telephone' => $request->telephone,
            'address' => ucwords(strtolower($request->address))
        );
        return view('diagnosis.result', compact('data'));
    }

    private function case_base_reasoning($symptom){
        $weight = $this->calculate_weight($symptom);
        $total_weight = $this->calculate_total_weight();

        return number_format($weight / $total_weight, 2) * 100;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function show(Diagnosis $diagnosis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnosis $diagnosis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diagnosis $diagnosis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diagnosis  $diagnosis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diagnosis $diagnosis)
    {
        //
    }
}
