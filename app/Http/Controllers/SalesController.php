<?php

namespace App\Http\Controllers;

use App\Models\sales;
use Exception;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sales=sales::all();
        $sales=sales::with('cabang')->get();
        return response()->json([
            'data'=>$sales,
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
        $sales=sales::create([
            'cabang_id'=>$request->cabang_id,
            'tanggal'=>$request->tanggal,
            'jumlah_sales'=>$request->jumlah_sales,
        ]);
        return response()->json([
            'data'=>$sales
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sales=sales::findOrFail($id);
        return response()->json([
            'data'=>$sales
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sales $sales,$id)
    {
        // return $request->all();
        // $sales->update([
        //     $request->all()
        //     'cabang_id'=>"bf60f9c9-5c0c-4741-8b98-0f87d2cf468c",
        //     'tanggal'=>"2023-09-09",
        //     'jumlah_sales'=>"3",
        // ]);
        $sales = sales::findOrFail($id);
        // return $sales;
        $sales->cabang_id = $request->cabang_id;
        $sales->tanggal =$request->tanggal;
        $sales->jumlah_sales =$request->jumlah_sales;
        $sales->update();
        return response()->json([
            'data'=>$sales
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sales=sales::findOrFail($id);
        $sales->delete();
        return response()->json([
            'data'=>$sales
        ]);
    }
}
