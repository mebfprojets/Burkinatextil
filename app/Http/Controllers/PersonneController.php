<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use Illuminate\Http\Request;

class PersonneController extends Controller
{
    public function create()
    {
        return view('personne.create');
    }

    public function store(Request $request)
    {
        // Pour Récupérer tous les champs
        //dd($request->all());
        Personne::create([
            'nom'=> $request->nom,
            'prenom'=> $request->prenom,
            'age'=> $request->age,
            'email'=> $request->email
        ]);
        return redirect()->back();
    }
    public function index()
    {
        //Récupérer tous les enregistrements de la table personne
        $personnes=Personne::all();
        return view('personne.index', compact('personnes'));
    }
    
    public function edit(Personne $personne)
    {
       //$personne = Personne::find($id);
       return view('personne.edit', compact('personne'));
    }

    public function update(Request $request, Personne $personne)
    {
       // $personne=Personne::find($id);
        $personne->update([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'age'=>$request->age,
            'email'=>$request->email
        ]);
        return redirect()->route("personne.index");
    }

}
