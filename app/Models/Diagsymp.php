<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagsymp extends Model
{
    use HasFactory;

    public function symptoms(){
    	return $this->hasOne('App\Models\Symptom');
    }

    public function diagnoses(){
    	return $this->hasOne('App\Models\Diagnosis');
    }
}
