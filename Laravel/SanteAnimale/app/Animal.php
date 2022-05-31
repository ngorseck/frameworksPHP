<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = array('nom', 'categorie');
    public static $rules = array('nom'=>'required|min:3', 'categorie'=>'required|min:3');

    public function consultations()
    {
        return $this->hasMany('App\Consultation');
    }
}
