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
        $validated = $request->validate([
            'name' => 'required|string',
            'price' => 'required|int',
        ]);
        Burgir::create($validated);
        return "burgir creada";
        // $burgir = Burgir::find($validated['id']);
        // if(!$burgir){
        //     return "burgir no encontrada";
        // }
        // $burgir->update($validated);

        // return response()->json($burgir, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $burgir = Burgir::find($id);
        if(!$burgir){
            return "burgir no encontrada";
        }
        return response()->json($burgir, 200);
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
        //return $request;
        $validated = $request->validate([
            'id' => 'required|int',
            'name' => 'string',
            'price' => 'int',
        ]);
        $burgir = Burgir::find($validated['id']);
        if(!$burgir){
            return "burgir no encontrada";
        }
        $burgir->update($validated);

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
        $burgir = Burgir::find($id);
        if(!$burgir){
            return "burgir no encontrada";
        }
        $burgir->delete();

        return response()->json(['message' => 'Burgir borrada'], 204);
    }
}
