<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paiement;
use App\Models\Client;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::latest()->get();
        $paiement = Paiement::with(['vente'])->orderBy('id','desc')->paginate(10);
        return view('pages.paiement', compact('paiement','client'));
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
            'vente_id' => 'required',
            'montant' => 'required',
            'devise' => 'required',
        ]);

        $paiement = new Paiement;
        $paiement->vente_id = $request->input('vente_id');
        $paiement->montant = $request->input('montant');
        $paiement->devise = $request->input('devise');
        $paiement->save();

        return redirect(route('paiement.index'))->with([
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
        $paiement = Paiement::findOrFail($id);
        return view('pages.paiement', compact('paiement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $this->validate($request, [
        //     'vente_id' => 'sometimes|integer',
        //     'montant' => 'sometimes|integer',
        //     'devise' => 'sometimes|string',
        // ]);

        // $paiement = new Paiement;
        // $paiement->vente_id = $request->input('vente_id');
        // $paiement->montant = $request->input('montant');
        // $paiement->devise = $request->input('devise');
        // $paiement->save();

        \DB::update("UPDATE paiements set vente_id = ?, montant = ?, devise = ? WHERE id= ? ", [$request->vente_id,$request->montant,$request->devise,$request->id]);

        return redirect(route('paiement.index'))->with([
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
        Paiement::find($id)->delete();
        return redirect(route('paiement.index'))->with([
            'message' => 'Successfully deleted.!',
            'alert-type' => 'success',
        ]);
    }
}
