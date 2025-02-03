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
    public function index()
    {
        //
        $shopCard = ShopCard::all();
        return response()->json($shopCard,200);
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
     * @param  \App\Models\ShopCard  $shopCard
     * @return \Illuminate\Http\Response
     */
    public function show(ShopCard $shopCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShopCard  $shopCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShopCard $shopCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShopCard  $shopCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopCard $shopCard)
    {
        //
    }
}
