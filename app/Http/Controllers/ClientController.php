<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::latest()->get();
        return view('pages.client', compact('client'));
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
            'adresse' => 'required',
            'telephone' => 'required',
            'mail' => 'sometimes|email',
        ]);

        $client = new Client;
        $client->nom = $request->input('nom');
        $client->adresse = $request->input('adresse');
        $client->telephone = $request->input('telephone');
        $client->mail = $request->input('mail');
        $client->save();

        return redirect(route('client.index'))->with([
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
        $client = Client::findOrFail($id);
        return view('pages.client', compact('client'));
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
        $this->validate($request, [
            'nom' => 'sometimes|string',
            'adresse' => 'sometimes|string',
            'telephone' => 'sometimes|string',
            'mail' => 'sometimes|string',
        ]);

        // $client = Client::find($id);
        $client->nom = $request->input('nom');
        $client->adresse = $request->input('adresse');
        $client->telephone = $request->input('telephone');
        $client->mail = $request->input('mail');
        $client->save();

        return redirect(route('client.index'))->with([
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
        Client::find($id)->delete();
        // Client::where('id',$id)->delete();
        return redirect(route('client.index'))->with([
            'message' => 'Successfully deleted.!',
            'alert-type' => 'success',
        ]);
    }
}
