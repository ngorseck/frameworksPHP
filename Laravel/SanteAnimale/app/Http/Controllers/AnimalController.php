<?php

namespace App\Http\Controllers;

use App\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('animal.list');
    }

    public function getAll()
    {
        $animaux = Animal::all();
        return view('animal.list', ['animaux' => $animaux]);
    }

    public function add()
    {
        return view('animal.add');
    }

    public function persist(Request $request)
    {
        if($request->method() == "POST") {
            $animal = new Animal();
            $animal->nom = $request->nom;
            $animal->categorie = $request->categorie;
            $result = $animal->save();

            return $this->getAll();
            //Ou-bien
            //return redirect()->route('animalgetAll');
        }else{
            return $this->add();
        }
    }

    public function update(Request $request)
    {
        if($request->method() == "POST") {
            $animal = Animal::find($request->id);
            $animal->nom = $request->nom;
            $animal->categorie = $request->categorie;
            $result = $animal->save();

            return $this->getAll();
        }else{
            return $this->add();
        }
    }

    public function get($id)
    {
        $animal = Animal::find($id);
        return view('animal.edit', ['animal' => $animal]);
    }

    public function delete($id)
    {
        $animal = Animal::find($id);
        if($animal != null) {
            $animal->delete();
        }
        return $this->getAll();
    }
}
