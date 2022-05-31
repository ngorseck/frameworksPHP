<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = array('animals_id', 'vetos_id', 'users_id', 'libelle', 'constat');

    public static $rules = array('animals_id'=>'required|integer', 'vetos_id'=>'required|integer',
                                'users_id'=>'required|bigInteger', 'libelle'=>'required|min:20',
                                'constat'=>'required|min:20');

    public function animals()
    {
        return $this->belongsTo('App\Animal');
    }

    public function vetos()
    {
        return $this->belongsTo('App\Veto');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
