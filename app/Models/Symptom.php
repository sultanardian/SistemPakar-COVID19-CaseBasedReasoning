<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'code', 'symptom', 'weight', 'information', 'treatment'];

    public function users(){
    	return $this->hasOne('App\Models\User');
    }

    public function diagsymps(){
    	return $this->hasMany('App\Models\Diagsymp');
    }
}
