<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Symptom;
use App\Models\Diagnosis;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()) {
            // $data = 
            //     $diagnosis = Diagnosis::get()->count(),
            //     $symptom = Symptom::get()->count()
            // };
            $diagnosis = Diagnosis::get()->count();
            $symptom = Symptom::get()->count();

            return view('dashboard.index', compact('diagnosis', 'symptom'));
        }
        else {
            return view('home');
        }
    }

    public function admin(){
        return view('auth.login');
    }
}
