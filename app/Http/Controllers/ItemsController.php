<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Http\Requests\StoreItemsRequest;
use App\Http\Requests\UpdateItemsRequest;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function createItems (StoreItemsRequest $request)
    {
       
    }
    public function index()
    {
         return Items::all()->keyBy('id');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemsRequest $request)
    {
         $item = new Items();
        $item->title = $request->title;
        $item->save();
        return response()->json(["token" => $item->createToken('api')->plainTextToken]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Items $items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Items $items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemsRequest $request, Items $items)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Items $items)
    {
        $items->delete();
        return response()->json(['message' => 'ok']);
    }
}
