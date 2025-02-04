<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ShopCard;
use Illuminate\Http\Request;

class ShopCardController extends Controller
{
    public function __construct() //proteger la api con el token
    {
        $this->middleware("auth:api");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $shopCard = ShopCard::get()->where("idUnico", "=", $request->idUnico);
        return response()->json($shopCard, 200);
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
        $producto = ShopCard::where("idProducto", "=", $request->idProducto)
            ->where("idUnico", "=", $request->idUnico)->first();
        if (!$producto) {
            $shopCard = new ShopCard();
            $shopCard->idProducto = $request->idProducto;
            $shopCard->nombre = $request->nombre;
            $shopCard->precio = $request->precio;
            $shopCard->cantidad = $request->cantidad;
            $shopCard->idUnico = $request->idUnico;
            $shopCard->save();
            return response()->json(["message" => "añadido al carrito"], 201);
        }
        $producto->cantidad = $producto->cantidad + $request->cantidad;
        $producto->save();
        return response()->json(["message" => "actualizado al carrito"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShopCard  $shopCard
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $shopCard = ShopCard::findOrFail($id);
        return response()->json($shopCard, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShopCard  $shopCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $shopCard = ShopCard::findOrFail($id);
        $shopCard->cantidad = $request->cantidad;
        $shopCard->save();
        return response()->json(["message" => "cantidad actualizada correctamente"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShopCard  $shopCard
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $shopCard = ShopCard::findOrFail($id);
        $shopCard->delete();
        return response()->json(["message" => "producto eliminado del carrito"]);
    }
}
