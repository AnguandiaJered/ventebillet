<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Champions;

class ChampionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $champions = Champions::latest()->get();
        return view('pages.competition', compact('champions'));
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
            'name' => 'required',
            'country' => 'required',
        ]);

        $champions = new Champions;
        $champions->name = $request->input('name');
        $champions->country = $request->input('country');
        $champions->save();

        return redirect(route('champions.index'))->with([
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
        $champions = Champions::findOrFail($id);
        return view('pages.competition', compact('champions'));
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
        //     'name' => 'sometimes|string',
        //     'country' => 'sometimes|string',
        // ]);

        // $champions = Champions::findOrFail($id);
        // $champions->name = $request->input('name');
        // $champions->country = $request->input('country');
        // $champions->save();

        \DB::update("UPDATE champions set name = ?, country = ? WHERE id= ? ", [$request->name,$request->country,$request->id]);

        return redirect(route('champions.index'))->with([
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
        Equipe::find($id)->delete();
        return redirect(route('champions.index'))->with([
            'message' => 'Successfully deleted.!',
            'alert-type' => 'success',
        ]);
    }
}
