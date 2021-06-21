<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FilieresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filiere = Filiere::all();
        return view("filieres")->with('filieres',$filiere);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->PrenomEnseignant);
       
        Filiere::create([
            "NomFiliere" => $request->NomFiliere,
            
        ]);

        $filiere = Filiere::all();
        return view("filieres")->with('filieres',$filiere)->with('success','Filiere ajouté !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function show(Filiere $filiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Filiere  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function edit(Filiere $filiere)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filiere $filiere)
    {
        $oldId = $request->Oldid;
        $filiere = Filiere::where("id", $oldId);
        $filiere->update([
            "id" => $request->id,
            "NomFiliere" => $request->NomFiliere,
           
           
        ]);

        return Redirect::route('filieres')->with('success',"Filiere  mis à jour !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Filiere  $filiere
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , Filiere $filiere)
    {
        $id = $request->id;
        $filiere = Filiere::where("id", $id);
        $filiere->delete();
        return Redirect::route('filieres')->with('success',"Filieres supprimer avec succes !");
    }

   

}
