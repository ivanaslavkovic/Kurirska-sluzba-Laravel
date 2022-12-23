<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaketKontroler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['Paketi' => Paket::all()]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function show(Paket $paket)
    {
        return response()->json(['Paket' => Paket::findOrFail($paket->id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit(Paket $paket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paket $paket)
    {
        $validator = Validator::make($request->all(), [
            'broj' => 'required|string',
            'tezina' => 'required|integer',
            'status' => 'required|string',
            'korisnik_id' => 'required|integer',
            'dostava_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['Info' => $validator->errors()]);
        }

        $paket->broj = $request->broj;
        $paket->tezina = $request->tezina;
        $paket->status = $request->status;
        $paket->korisnik_id = $request->korisnik_id;
        $paket->dostava_id = $request->dostava_id;
        $paket->save();

        return response()->json(['Info' => 'Paket je izmenjen']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paket $paket)
    {
        Paket::findOrFail($paket->id)->delete();
        return response()->json(['Info' => 'Paket je obrisan']);
    }
}
