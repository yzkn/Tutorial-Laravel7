<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

use App\Item;
use App\SubItem;

use App\Http\Requests\ApiSubItemRequest;
use App\Http\Requests\ItemRequest;

use App\Services\Util;

class ApiSubItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::debug(get_class($this).' '.__FUNCTION__.'()');
        Log::debug('User: '.Auth::user());

        $sub_items = SubItem::all();
        return response()->json([
            'message' => 'ok',
            'data' => $sub_items
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::debug(get_class($this).' '.__FUNCTION__.'()');
        Log::debug('User: '.Auth::user());
        // Log::debug('$request: '.$request);

        $sub_item = new SubItem;
        $form = $request->all();
        unset($form['_token']);
        unset($form['filepath']);
        unset($form['filecontent']);
        $sub_item->fill($form);

        if(null !== ($request->filecontent))
        {
            $img = $request->filecontent;
            list(, $img) = explode(';', $img);
            list(, $img) = explode(',', $img);
            $file_binary_data = Util::urlsafe_b64decode($img);

            $tmpname = Util::GUID();
            Log::debug('$tmpname: '.$tmpname);
            Storage::put('public/temp/'.$tmpname, $file_binary_data);
            Log::debug('Storage: '.Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix().'public/temp/'.$tmpname);

            if(!Util::is_picture(Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix().'public/temp/'.$tmpname)){
                Storage::delete('public/temp/'.$tmpname);
                $sub_item->save();

                return response()->json([
                    'message' => 'SubItem created successfully',
                    'data' => $sub_item
                ], 201, [], JSON_UNESCAPED_UNICODE);
            }

            $newpath = Util::GUID();
            Storage::move('public/temp/'.$tmpname, 'public/uploaded/'.$newpath);
            $sub_item->filepath = $newpath;
        }

        $sub_item->save();

        return response()->json([
            'message' => 'SubItem created successfully',
            'data' => $sub_item
        ], 201, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Log::debug(get_class($this).' '.__FUNCTION__.'()');
        Log::debug('User: '.Auth::user());
        Log::debug('$id: '.$id);

        $sub_item = SubItem::find($id);
        if ($sub_item) {
            return response()->json([
                'message' => 'ok',
                'data' => $sub_item
            ], 200, [], JSON_UNESCAPED_UNICODE);
        } else {
            return response()->json([
                'message' => 'Item not found',
            ], 404);
        }
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
        Log::debug(get_class($this).' '.__FUNCTION__.'()');
        Log::debug('User: '.Auth::user());
        Log::debug('$request: '.$request);
        Log::debug('$id: '.$id);

        $update = [
            'subtitle' => $request->subtitle,
            'subcontent' => $request->subcontent
        ];
        $sub_item = SubItem::where('id', $id)->update($update);
        if ($sub_item) {
            return response()->json([
                'message' => 'SubItem updated successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'SubItem not found',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Log::debug(get_class($this).' '.__FUNCTION__.'()');
        Log::debug('User: '.Auth::user());
        Log::debug('$id: '.$id);

        $sub_item = SubItem::where('id', $id)->delete();
        if ($sub_item) {
            return response()->json([
                'message' => 'SubItem deleted successfully',
            ], 204);
        } else {
            return response()->json([
                'message' => 'SubItem not found',
            ], 404);
        }
    }
}
