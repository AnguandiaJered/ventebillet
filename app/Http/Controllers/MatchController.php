<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matchs;
use App\Models\Stade;
use App\Models\Champions;
use App\Models\Equipe;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stade = Stade::latest()->get();
        $champions = Champions::latest()->get();
        $equipe = Equipe::latest()->get();
        // $match = Matchs::with(['stade','champion'])->orderBy('id','desc')->paginate(10);
        $match = \DB::select("SELECT * from matchs INNER JOIN stades on stades.id=matchs.stade_id INNER JOIN champions on champions.id=matchs.champions_id");
        return view('pages.match', compact('match','stade','champions','equipe'));
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
            'stade_id' => 'required',
            'champions_id' => 'required',
            'equipe_principale' => 'required',
            'equipe_adverse' => 'required',
            'date_match' => 'required',
            'heure_match' => 'required',
            'prix' => 'required',
            'devise' => 'required',
        ]);

        $match = new Matchs;
        $match->stade_id = $request->input('stade_id');
        $match->champions_id = $request->input('champions_id');
        $match->equipe_principale = $request->input('equipe_principale');
        $match->equipe_adverse = $request->input('equipe_adverse');
        $match->date_match = $request->input('date_match');
        $match->heure_match = $request->input('heure_match');
        $match->prix = $request->input('prix');
        $match->devise = $request->input('devise');
        $match->save();

        return redirect(route('match.index'))->with([
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
        $match = Matchs::findOrFail($id);
        return view('pages.match', compact('match'));
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
        //     'stade_id' => 'sometimes|integer',
        //     'champions_id' => 'sometimes|integer',
        //     'equipe_principale' => 'sometimes|string',
        //     'equipe_adverse' => 'sometimes|string',
        //     'date_match' => 'sometimes|string',
        //     'heure_match' => 'sometimes|string',
        // ]);

        // $match = Matchs::findOrFail($id);
        // $match->stade_id = $request->input('stade_id');
        // $match->champions_id = $request->input('champions_id');
        // $match->equipe_principale = $request->input('equipe_principale');
        // $match->equipe_adverse = $request->input('equipe_adverse');
        // $match->date_match = $request->input('date_match');
        // $match->heure_match = $request->input('heure_match');
        // $match->save();

        \DB::update("UPDATE matchs set stade_id = ?, champions_id = ?, equipe_principale = ?, equipe_adverse = ?, date_match = ?, heure_match =?, prix = ? , devise = ? WHERE id= ? ", [$request->stade_id,$request->champions_id,$request->equipe_principale,$request->equipe_adverse,$request->date_match,$request->heure_match,$request->prix,$request->devise,$request->id]);

        return redirect(route('match.index'))->with([
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
        Matchs::find($id)->delete();
        return redirect(route('match.index'))->with([
            'message' => 'Successfully deleted.!',
            'alert-type' => 'success',
        ]);
    }
}
