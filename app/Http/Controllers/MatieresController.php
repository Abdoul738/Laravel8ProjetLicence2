<?php

namespace App\Http\Controllers;

use App\Models\Matieres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MatieresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // dd($request->id);
        $matiere = Matieres::all();
        return view("matieres")->with('matiere',$matiere);
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
        
       
        Matieres::create([
            "NomMatiere" => $request->NomMatiere,
        ]);

        $matiere = Matieres::all();
        return view("matieres")->with('matieres',$matiere)->with('success','Matiere ajouté !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matieres  $matiere
     * @return \Illuminate\Http\Response
     */
    public function show(matieres $matiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matieres $matiere
     * @return \Illuminate\Http\Response
     */
    public function edit(Matieres $matiere)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matieres  $matiere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matieres $matiere)
    {
        $oldId = $request->Oldid;
        $matiere = Matieres::where("id", $oldId);
        $matiere->update([
            "id" => $request->id,
            "NomMatiere" => $request->NomMatiere,
            
           
        ]);

        return Redirect::route('matieres')->with('success',"Matiere  mis à jour !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matieres  $matiere
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , Matieres $matiere)
    {
        $id = $request->id;
        $matiere = Matieres::where("id", $id);
        $matiere->delete();
        return Redirect::route('matieres')->with('success',"Matiere supprimer avec succes !");
    }

   

}
