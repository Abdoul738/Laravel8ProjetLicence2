<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SallesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // dd($request->id);
        $salle = Salle::all();
        return view("salles")->with('salles',$salle);
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
        
       
        Salle::create([
            "NomSalle" => $request->NomSalle,
        ]);

        $salle = Salle::all();
        return view("salles")->with('salles',$salle)->with('success','Salle ajouté !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function show(salle $enseignant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function edit(Salle $salle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salle  $salle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salle $salle)
    {
        $oldId = $request->Oldid;
        $salle = Salle::where("id", $oldId);
        $salle->update([
            "id" => $request->id,
            "NomSalle" => $request->NomSalle,
            
           
        ]);

        return Redirect::route('salles')->with('success',"Salle  mis à jour !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salle  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , Salle $salle)
    {
        $id = $request->id;
        $salle = Salle::where("id", $id);
        $salle->delete();
        return Redirect::route('salles')->with('success',"Salle supprimer avec succes !");
    }

   

}
