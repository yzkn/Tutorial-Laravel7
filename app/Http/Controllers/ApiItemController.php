<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Item;

use App\Http\Requests\ItemRequest;

class ApiItemController extends Controller
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

        $items = Item::with('sub_items')->get();
        return response()->json([
            'message' => 'ok',
            'data' => $items
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        Log::debug(get_class($this).' '.__FUNCTION__.'()');
        Log::debug('User: '.Auth::user());
        Log::debug('$request: '.$request);

        $item = new Item;
        $form = $request->all();
        unset($form['_token']);
        $item->fill($form)->save();

        return response()->json([
            'message' => 'Item created successfully',
            'data' => $item
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

        $item = Item::find($id);
        if ($item) {
            return response()->json([
                'message' => 'ok',
                'data' => $item
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
            'title' => $request->title,
            'content' => $request->content
        ];
        $item = Item::where('id', $id)->update($update);
        if ($item) {
            return response()->json([
                'message' => 'Item updated successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Item not found',
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

        $item = Item::where('id', $id)->delete();
        if ($item) {
            return response()->json([
                'message' => 'Item deleted successfully',
            ], 204);
        } else {
            return response()->json([
                'message' => 'Item not found',
            ], 404);
        }
    }
}
