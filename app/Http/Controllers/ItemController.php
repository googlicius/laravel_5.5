<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItem;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::search()->paginate(10);
        return view('item.list', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Item;
        return view('item.edit', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreItem  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItem $request)
    {
        $item = new Item;
        $item->fill($request->all())->save();
        return redirect('/item');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('item.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreItem  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(StoreItem $request, Item $item)
    {
        $item->fill($request->all())->save();
        return redirect('/item');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return response('Item deleted');
    }
}
