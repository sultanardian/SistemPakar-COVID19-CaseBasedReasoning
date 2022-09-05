<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RespondentController extends Controller
{
    public function index(){
        $diagnoses = DB::table('visitors')
                    ->join('diagnoses', 'visitors.id', '=', 'diagnoses.visitor_id')
                    ->get();


        $datas = [];

        $id = 0;

        foreach ($diagnoses as $diagnosis) {
            $diagsymps = DB::table('diagsymps')
                        ->join('symptoms', 'diagsymps.symptom_id', '=', 'symptoms.id')
                        ->where('diagnosis_id', $diagnosis->id)
                        ->get();

            $symptoms = [];

            foreach ($diagsymps as $diagsymp) {
                array_push($symptoms, $diagsymp->symptom);
            }

            $data = [
                'id' => $id,
                'name' => $diagnosis->name,
                'nik' => $diagnosis->nik,
                'gender' => $diagnosis->gender,
                'telephone' => $diagnosis->telephone,
                'address' => $diagnosis->address,
                'score' => $diagnosis->score,
                'symptoms'  => $symptoms
            ];

            array_push($datas, $data);

            $id++;
        }
    	return view('respondent.index', compact('datas'));
    }
}
