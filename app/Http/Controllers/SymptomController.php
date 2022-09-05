<?php

namespace App\Http\Controllers;

use App\Models\Symptom;
use App\Models\Diagnosis;
use App\Models\Diagsymp;
use Illuminate\Http\Request;
use DB;
use Auth;

class SymptomController extends Controller
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

        return view('symptom.index', compact('symptoms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('symptom.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $symptom = new Symptom([
            'user_id' => Auth::user()->id,
            'code' => $request->code,
            'symptom' => ucfirst(strtolower($request->symptom)),
            'weight' => $request->weight,
            'information' => $request->information,
            'treatment' => $request->treatment
        ]);

        $symptom->save();

        $this->update_diagnosis();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Symptom  $symptom
     * @return \Illuminate\Http\Response
     */
    public function show(Symptom $symptom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Symptom  $symptom
     * @return \Illuminate\Http\Response
     */
    public function edit(Symptom $symptom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Symptom  $symptom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Symptom $symptom)
    {
        $last_weight = $symptom->weight;

        $symptom->code = $request->code;
        $symptom->symptom = ucfirst(strtolower($request->symptom));
        $symptom->weight = $request->weight;
        $symptom->information = $request->information;
        $symptom->treatment = $request->treatment;
        $symptom->update();

        if ($request->weight != $last_weight) {
            $this->update_diagnosis();
        }
        return redirect()->back();
    }

    private function update_diagnosis(){
        $diagnoses = Diagnosis::get();
        
        foreach ($diagnoses as $diagnosis) {
            
            $score = 0;
            $symptoms = Diagsymp::where('diagnosis_id', $diagnosis->id)->get();

            $weight = [];
            foreach ($symptoms as $symptom) {
                array_push($weight, Symptom::where('id', $symptom->symptom_id)->get()[0]->weight);
                

            }
            $total_weight = $this->calculate_total_weight();

            if ($total_weight == 0) {
                $score += 0;
            }
            else{
                $score += number_format(array_sum($weight) / $total_weight, 2);
            }

            $diagnosis->score = $score;
            $diagnosis->update();
        }
    }

    private function calculate_total_weight(){
        $total_weight = 0;

        $symptoms = Symptom::get('weight');

        foreach ($symptoms as $symptom) {
            $total_weight += $symptom->weight;
        }

        return $total_weight;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Symptom  $symptom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Symptom $symptom)
    {
        $diagsymps = DB::table('symptoms')
        ->where('symptoms.id', $symptom->id)
        ->join('diagsymps', 'diagsymps.symptom_id', '=', 'symptoms.id')
        ->get();

        foreach ($diagsymps as $diagsymp) {
            DB::table('diagsymps')
                ->where('symptom_id', $symptom->id)
                ->delete();
        }

        $symptom->delete();

        $this->update_diagnosis();

        return redirect()->back();
    }
}
