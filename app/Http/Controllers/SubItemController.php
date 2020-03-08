<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\SubItem;

class SubItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_items = SubItem::all();
        return view('subitem.index', ['sub_items' => $sub_items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all();
        return view('subitem.create', ['items' => $items]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sub_item = new SubItem;
        $form = $request->all();
        unset($form['_token']);
        $sub_item->fill($form)->save();
        return redirect('/subitem');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sub_item = SubItem::find($id);
        return view('subitem.show', ['sub_item' => $sub_item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Item::all();
        $sub_item = SubItem::find($id);
        return view('subitem.edit', ['items' => $items, 'sub_item' => $sub_item]);
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
        $sub_item = SubItem::find($id);
        $form = $request->all();
        unset($form['_token']);
        $sub_item->fill($form)->save();
        return redirect('/subitem');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub_item = SubItem::find($id);
        $sub_item->delete();
        return redirect('/subitem');
    }
}

// Copyright (c) 2020 YA-androidapp(https://github.com/YA-androidapp) All rights reserved.
