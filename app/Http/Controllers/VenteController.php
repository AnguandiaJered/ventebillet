<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vente;
use App\Models\Client;
use App\Models\Matchs;

class VenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::latest()->get();
        $match = Matchs::latest()->get();
        $vente = Vente::with(['client','match'])->orderBy('id','desc')->paginate(10);
        return view('pages.vente', compact('vente','client','match'));
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
            'client_id' => 'required',
            'match_id' => 'required',
            'prix' => 'required',
            'nbr_billet' => 'required',
        ]);

        $vente = new Vente;
        $vente->client_id = $request->input('client_id');
        $vente->match_id = $request->input('match_id');
        $vente->prix = $request->input('prix');
        $vente->nbr_billet = $request->input('nbr_billet');
        $vente->save();

        return redirect(route('vente.index'))->with([
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
        $vente = Vente::findOrFail($id);
        return view('pages.vente', compact('vente'));
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
            'client_id' => 'sometimes|integer',
            'match_id' => 'sometimes|integer',
            'prix' => 'sometimes|integer',
            'nbr_billet' => 'sometimes|integer',
        ]);

        $vente = Vente::findOrFail($id);
        $vente->client_id = $request->input('client_id');
        $vente->match_id = $request->input('match_id');
        $vente->prix = $request->input('prix');
        $vente->nbr_billet = $request->input('nbr_billet');
        $vente->save();

        return redirect(route('vente.index'))->with([
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
        Vente::find($id)->delete();
        return redirect(route('vente.index'))->with([
            'message' => 'Successfully deleted.!',
            'alert-type' => 'success',
        ]);
    }
}
