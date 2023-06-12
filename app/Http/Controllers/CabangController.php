<?php

namespace App\Http\Controllers;

use App\Models\cabang;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cabang=cabang::all();
        return response()->json([
            'data'=>$cabang
        ]);
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
        $cabang=cabang::create([
            'nama_cabang'=>$request->nama_cabang,
            'alamat'=>$request->alamat,
            'kontak'=>$request->kontak,
        ]);
        return response()->json([
            'data'=>$cabang
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cabang  $cabang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cabang=cabang::findOrFail($id);
        // $cabang->find();
        return response()->json([
            'data'=>$cabang
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cabang  $cabang
     * @return \Illuminate\Http\Response
     */
    public function edit(cabang $cabang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cabang  $cabang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cabang $cabang)
    {
        $cabang->update([
            'nama_cabang'=>$request->nama_cabang,
            'alamat'=>$request->alamat,
            'kontak'=>$request->kontak,
        ]);
        return response()->json([
            'data'=>$cabang
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cabang  $cabang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cabang=cabang::findOrFail($id);
        $cabang->delete();
        return response()->json([
            'data'=>$cabang
        ]);
    }
}
