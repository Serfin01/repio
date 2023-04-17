<?php

namespace App\Http\Controllers;

use App\Models\Burgir;
use Illuminate\Http\Request;

class BurgirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $burger = Burgir::all();
        return $burger;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Burgir::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $burgir = Burgir::findOrFail($id);

        return response()->json($burgir, 200);
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
        $burgir = Burgir::findOrFail($id);
        $burgir->update($request->all());

        return response()->json($burgir, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $burgir = Burgir::findOrFail($id);
        $burgir->delete();

        return response()->json(['message' => 'Burgir borrada'], 204);
    }
}
