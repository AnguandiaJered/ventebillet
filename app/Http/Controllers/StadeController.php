<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stade;
use Illuminate\Support\Facades\Storage;

class StadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stade = Stade::latest()->get();
        return view('pages.stade', compact('stade'));
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
        $this->validate($request, [
            'nom' => 'required',
            'taille' => 'required',
            'nbr_place' => 'required',
        ]);

        $stade = new Stade;
        $stade->nom = $request->input('nom');
        $stade->taille = $request->input('taille');
        $stade->nbr_place = $request->input('nbr_place');    
        $stade->save();

        return redirect(route('stade.index'))->with([
            'message' => 'Successfully saved.!',
            'alert-type' => 'success',
        ]); 
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stade = Stade::findOrFail($id);
        return view('pages.stade', compact('stade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom' => 'sometimes|string',
            'taille' => 'sometimes|string',
            'nbr_place' => 'sometimes|string',            
        ]);
    
        $stade = new Stade;
        $stade->nom = $request->input('nom');
        $stade->taille = $request->input('taille');
        $stade->nbr_place = $request->input('nbr_place');    
        $stade->save();

        return redirect(route('stade.index'))->with([
            'message' => 'Successfully updated.!',
            'alert-type' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Stade::find($id)->delete();
        return redirect(route('stade.index'))->with([
            'message' => 'Successfully deleted.!',
            'alert-type' => 'success',
        ]);
    }
}
