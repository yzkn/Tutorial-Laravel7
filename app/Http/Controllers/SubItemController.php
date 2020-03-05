<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('sub_item.index', ['sub_items' => $sub_items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub_item = new SubItem;
        return view('sub_item.edit', ['sub_item' => $sub_item]);
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
        return redirect('/sub_item');
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
        return view('sub_item.show', ['sub_item' => $sub_item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub_item = SubItem::find($id);
        return view('sub_item.edit', ['sub_item' => $sub_item]);
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
        return redirect('/sub_item');
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
        return redirect('/sub_item');
    }
}
