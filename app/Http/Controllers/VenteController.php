<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vente;
use App\Models\Client;
use App\Models\Matchs;
use App\Models\Zonesiege;

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
        $match = \DB::select("SELECT matchs.id,matchs.stade_id,matchs.champions_id,CONCAT(matchs.equipe_principale,' VS ', matchs.equipe_adverse) AS equipes,matchs.date_match,matchs.heure_match,stades.nom as stade,stades.emplacement,stades.photo,champions.name as championnat FROM matchs INNER JOIN stades on stades.id=matchs.stade_id INNER JOIN champions on champions.id=matchs.champions_id order by id desc;");
        $zonesiege = \DB::select("SELECT * FROM `zonesieges` WHERE status='vide';");
        // $vente = Vente::with(['client','match'])->orderBy('id','desc')->paginate(10);
        $vente = \DB::select("SELECT * FROM ventes INNER JOIN clients ON clients.id=ventes.client_id INNER JOIN matchs ON matchs.id=ventes.match_id INNER JOIN zonesieges on zonesieges.id=ventes.place_id");
        return view('pages.vente', compact('vente','client','match','zonesiege'));
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
            'place_id' => 'required',
        ]);

        // $vente = new Vente;
        // $vente->client_id = $request->input('client_id');
        // $vente->match_id = $request->input('match_id');
        // $vente->prix = $request->input('prix');
        // $vente->place_id = $request->input('place_id');
        // $vente->save();

        \DB::statement("CALL proc_vente(?,?,?,?)",[
            $request->client_id,
            $request->match_id,
            $request->prix,
            $request->place_id
        ]);
        // \DB::update("UPDATE zonesieges SET status='occuper' WHERE id=: ?", [$request->place_id]);
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
    public function update(Request $request)
    {
        // $this->validate($request, [
        //     'client_id' => 'sometimes|integer',
        //     'match_id' => 'sometimes|integer',
        //     'prix' => 'sometimes|integer',
        //     'nbr_billet' => 'sometimes|integer',
        // ]);

        // $vente = Vente::findOrFail($id);
        // $vente->client_id = $request->input('client_id');
        // $vente->match_id = $request->input('match_id');
        // $vente->prix = $request->input('prix');
        // $vente->nbr_billet = $request->input('nbr_billet');
        // $vente->save();

        \DB::update("UPDATE ventes set client_id = ?, match_id = ?, prix = ?, place_id = ? WHERE id= ? ", [$request->client_id,$request->match_id,$request->prix,$request->place_id,$request->id]);

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
