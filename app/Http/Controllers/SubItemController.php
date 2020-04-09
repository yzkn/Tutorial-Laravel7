<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

use App\Item;
use App\SubItem;

use App\StringUtil;

use App\Services\Util;

use App\Http\Requests\SubItemRequest;

class SubItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Log::info('$request: '.$request);
        $q = $request->input('q');
        $query = SubItem::query();

        if(!empty($q)) {
            $query->where('subtitle','like','%'.$q.'%')->orWhere('subcontent','like','%'.$q.'%');
        }

        $sub_items = $query->orderBy('created_at','desc')->get();
        return view('subitem.index')
        ->with('sub_items',$sub_items)
        ->with('q',$q);
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
    public function store(SubItemRequest $request)
    {
        Log::info('store');
        $sub_item = new SubItem;
        $form = $request->all();
        unset($form['_token']);
        unset($form['filepath']);
        $sub_item->fill($form);

        if(null !== ($request->file('filepath')))
        {
            $file = $request->file('filepath');
            dump("getClientOriginalName: " . $file->getClientOriginalName());
            dump("getClientOriginalExtension: " . $file->getClientOriginalExtension());
            dump("getClientMimeType: " . $file->getClientMimeType());
            dump("guessClientExtension: " . $file->guessClientExtension());
            dump("getSize: " . $file->getSize());
            dump("getError: " . $file->getError());
            dump("getMaxFilesize: " . $file->getMaxFilesize());

            $temppath = $request->file('filepath')->store('public/temp');
            $temppath = str_replace('public/temp', 'storage/temp', $temppath);
            if(!\App\Services\Util::is_picture($temppath)){
                Storage::delete($temppath);
                $sub_item->save();
                return redirect('/subitem');
            }

            Storage::delete($temppath);
            $newpath = StringUtil::gen_guid();
            $request->file('filepath')->storeAs('public/uploaded', $newpath);
            $sub_item->filepath = $newpath;
        }

        $sub_item->save();
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
        Log::info('update');
        $sub_item = SubItem::find($id);
        $form = $request->all();
        unset($form['_token']);
        unset($form['filepath']);
        $sub_item->fill($form);

        if(null !== ($request->file('filepath')))
        {
            $file = $request->file('filepath');
            dump("getClientOriginalName: " . $file->getClientOriginalName());
            dump("getClientOriginalExtension: " . $file->getClientOriginalExtension());
            dump("getClientMimeType: " . $file->getClientMimeType());
            dump("guessClientExtension: " . $file->guessClientExtension());
            dump("getSize: " . $file->getSize());
            dump("getError: " . $file->getError());
            dump("getMaxFilesize: " . $file->getMaxFilesize());

            $temppath = $request->file('filepath')->store('public/temp');
            $temppath = str_replace('public/temp', 'storage/temp', $temppath);
            if(!\App\Services\Util::is_picture($temppath)){
                Storage::delete($temppath);
                $sub_item->save();
                return redirect('/subitem');
            }

            Storage::delete($temppath);
            $newpath = StringUtil::gen_guid();
            $request->file('filepath')->storeAs('public/uploaded', $newpath);
            $sub_item->filepath = $newpath;
        }

        $sub_item->save();
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
