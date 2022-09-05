<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Symptom;

class GuestController extends Controller
{
    public function index(){
    	return view('home');
    }

    public function admin(){
    	return view('auth.login');
    }

    public function symptoms_information(){
    	$symptoms = Symptom::get();

    	return view('symptoms_information.index', compact('symptoms'));
    }
}
