<?php

namespace App\Http\Controllers;

use App\Models\Enseignant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EnseignantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enseignant = Enseignant::all();
        return view("enseignants")->with('enseignants',$enseignant);
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
       
        Enseignant::create([
            "NomEnseignant" => $request->NomEnseignant,
            "PrenomEnseignant" => $request->PrenomEnseignant,
            "Adresse" => $request->Adresse,
            "Telephone" => $request->Telephone,
        ]);

        $enseignant = Enseignant::all();
        return view("enseignants")->with('enseignants',$enseignant)->with('success','Enseignant ajouté !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enseignants  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function show(Enseignants $enseignant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enseignants  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function edit(Enseignants $enseignant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enseignant $enseignant)
    {
        $oldId = $request->Oldid;
        $enseignant = Enseignant::where("id", $oldId);
        $enseignant->update([
            "id" => $request->id,
            "NomEnseignant" => $request->NomEnseignant,
            "PrenomEnseignant" => $request->PrenomEnseignant,
            "Adresse" => $request->Adresse,
            "Telephone" => $request->Telephone,
           
        ]);

        return Redirect::route('enseignants')->with('success',"Enseignant  mis à jour !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , Enseignant $enseignant)
    {
        $id = $request->id;
        $enseignant = Enseignant::where("id", $id);
        $enseignant->delete();
        return Redirect::route('enseignants')->with('success',"Enseignant supprimer avec succes !");
    }

   

}
