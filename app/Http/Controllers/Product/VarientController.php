<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Product\VarientRequest;

use App\Models\Product\ProductVarient;
use App\Models\Product\MainProductModel;

class VarientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  App\Http\Requests\Product\VarientRequest  $req
     * @param $product_id
     * @return \Illuminate\Http\Response
     */
    public function store(VarientRequest $req, $product_id)
    {
        $toSave = $req->only('stock', 'price', 'color', 'size');
        $toSave['product_id'] = $product_id;

        $saving = new ProductVarient($toSave);
        $saving->save();

        return response()->json(['status' => true, 'message' => 'varient save']);

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Product\VarientRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VarientRequest $request, $id)
    {
        $toUpdate = $req->only('stock', 'price', 'color', 'size');
        ProductVarient::where('id', $id)->update($toUpdate);
        return response()->json(['status' => true, 'message' => 'product varient update success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductVarient::where('id', $id)->delete();
        return response()->json(['status' => true, 'message' => 'product varient delete success']);

    }
}
