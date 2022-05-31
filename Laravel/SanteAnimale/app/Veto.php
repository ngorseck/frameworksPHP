<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veto extends Model
{
    protected $fillable = array('nom', 'prenom', 'adresse', 'telephone');
    public static $rules = array('nom'=>'required|min:3', 'prenom'=>'required|min:3',
                                'adresse'=>'required|min:20', 'telephone'=>'required|min:9');

    public function consultations()
    {
        return $this->hasMany('App\Consultation');
    }
}
