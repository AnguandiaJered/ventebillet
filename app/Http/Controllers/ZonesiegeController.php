<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zonesiege;

class ZonesiegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zonesiege = Zonesiege::latest()->get();
        return view('pages.zonesiege', compact('zonesiege'));
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
            'numsiege' => 'required',
            'sectionstade' => 'required',
        ]);

        $zonesiege = new Zonesiege();
        
        $zonesiege->numsiege = $request->input('numsiege');
        $zonesiege->sectionstade = $request->input('sectionstade');

        $zonesiege->save();

        return redirect(route('zonesiege.index'))->with([
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
        $zonesiege = Zonesiege::findOrFail($id);
        return view('pages.zonesiege', compact('zonesiege'));
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
        \DB::update("UPDATE zonesieges set numsiege = ?, sectionstade = ? WHERE id= ? ", [$request->numsiege,$request->sectionstade,$request->id]);
        
        return redirect(route('zonesiege.index'))->with([
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
        Zonesiege::find($id)->delete();
        return redirect(route('zonesiege.index'))->with([
            'message' => 'Successfully deleted.!',
            'alert-type' => 'success',
        ]);
    }
}
