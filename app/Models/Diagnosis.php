<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;

    public function visitors(){
    	return $this->hasOne('App\Models\Visitor');
    }

    public function diagsymps(){
    	return $this->hasMany('App\Models\Diagsymp');
    }
}
