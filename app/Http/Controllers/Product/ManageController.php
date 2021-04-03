<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product\ProductVarient;
use App\Models\Product\MainProductModel;

use App\Http\Requests\Product\ProductRequest;

class ManageController extends Controller
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
     * @param  App\Http\Requests\Product\ProductRequest  $req
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $req){
        $toSave = $req->only('name', 'description');
        $saving = new MainProductModel($toSave);
        $saving->save();

        return response()->json(['status' => true, 'message'=>'product saved']);
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
     * @param  App\Http\Requests\Product\ProductRequest  $req
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $toUpdate = $req->only('name', 'description');
        MainProductModel::where('id', $id)->update($toUpdate);
        return response()->json(['status' => 'true', 'message' => 'product updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MainProductModel::where('id', $id)->delete();
        ProductVarient::where('product_id', $id)->delete();
        return resposnse()->json(['status' => 'true', 'product delete success']);
    }
}
