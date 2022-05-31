<?php

namespace App\Http\Controllers;

use App\Veto;
use Illuminate\Http\Request;

class VetoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('veto.list');
    }

    public function getAll()
    {
        $vetos = Veto::all();
        return view('veto.list', ['vetos' => $vetos]);
    }

    public function add()
    {
        return view('veto.add');
    }

    public function persist(Request $request)
    {
        if($request->method() == "POST") {
            $veto = new Veto();
            $veto->nom = $request->nom;
            $veto->prenom = $request->prenom;
            $veto->adresse = $request->adresse;
            $veto->telephone = $request->telephone;
            $result = $veto->save();

            return $this->getAll();
        }else{
            return $this->add();
        }
    }

    public function update(Request $request)
    {
        if($request->method() == "POST") {
            $veto = Veto::find($request->id);
            $veto->nom = $request->nom;
            $veto->prenom = $request->prenom;
            $veto->adresse = $request->adresse;
            $veto->telephone = $request->telephone;
            $result = $veto->save();

            return $this->getAll();
        }else{
            return $this->add();
        }
    }

    public function get($id)
    {
        $veto = Veto::find($id);
        return view('veto.edit', ['veto' => $veto]);
    }

    public function delete($id)
    {
        $veto = Veto::find($id);
        if($veto != null) {
            $veto->delete();
        }
        return $this->getAll();
    }
}
