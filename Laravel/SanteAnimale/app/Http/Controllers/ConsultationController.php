<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Consultation;
use App\User;
use App\Veto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ConsultationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('consultation.list');
    }

    public function getAll()
    {
        $consultations = Consultation::all();
        //echo $consultations;

        return view('consultation.list', ['consultations'=>$consultations]);
    }

    public function add()
    {
        //echo User::find(Auth::id())->id;
        $animaux = Animal::all();
        $vetos = Veto::all();
        return view('consultation.add', ['animaux'=>$animaux, 'vetos'=>$vetos]);
    }

    public function persist(Request $request)
    {
        if($request->method() == "POST")
        {
            $consultation = new Consultation();
            $consultation->animals_id = $request->animal;
            $consultation->vetos_id = $request->veto;
            $consultation->users_id = Auth::id();
            $consultation->libelle = $request->libelle;
            $consultation->constat = $request->constat;

            $consultation->save();
        }
        return $this->getAll();
        //oubien
        //return Redirect::to('/consultation/getAll');
    }

    public function update(Request $request)
    {
        if($request->method() == "POST")
        {
            $consultation = Consultation::find($request->id);
            $consultation->animals_id = $request->animal;
            $consultation->vetos_id = $request->veto;
            $consultation->users_id = Auth::id();
            $consultation->libelle = $request->libelle;
            $consultation->constat = $request->constat;

            $consultation->save();
        }
        return Redirect::to('consultation/getAll');
    }

    public function get($id)
    {
        $animaux = Animal::all();
        $vetos = Veto::all();
        $consultation = Consultation::find($id);
        return view('consultation.edit', ['consultation' => $consultation, 'animaux'=>$animaux, 'vetos'=>$vetos]);
    }

    public function delete($id)
    {
        $consultation = Consultation::find($id);
        if($consultation != null)
        {
            $consultation->delete();
        }
        return Redirect::to('consultation/getAll');
    }
}
