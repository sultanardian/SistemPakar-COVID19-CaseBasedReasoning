<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class HistoryController extends Controller
{
    public function index(Request $request){
    	$name = ucwords(strtolower($request->name));

    	$diagnoses = DB::table('visitors')
	    			->join('diagnoses', 'visitors.id', '=', 'diagnoses.visitor_id')
	    			->where([
	    				['name', $name],
	    				['nik', $request->nik],
	    				['telephone', $request->telephone]])
	    			->get();


	    $datas = [];

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
	    		'name' => $diagnosis->name,
	    		'nik' => $diagnosis->nik,
	    		'gender' => $diagnosis->gender,
	    		'telephone' => $diagnosis->telephone,
	    		'address' => $diagnosis->address,
	    		'date' => $diagnosis->updated_at,
	    		'score' => $diagnosis->score,
	    		'symptoms'  => $symptoms
	    	];

	    	array_push($datas, $data);
	    }

	    if (empty($datas)) {
	    	return view('diagnosis.history')->with(Session::flash('alert', 'Pengguna tidak ditemukan, silakan ulangi lagi!'));
	    }
	    else{
    		return view('diagnosis.history', compact('datas'));
	    }
    }
}
