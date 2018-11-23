<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Item;

class ListController extends Controller
{

    public function index() 
    {   
        //$items = DB::table('items')->where('user_id')->value(auth()->user()->id);
        $items = Item::all();
        return view('list', compact('items'));
    }

    public function create(request $request) 
    {
        $item = new Item([
        'item' => $request->get('text'),
        'user_id' => auth()->user()->id   
        ]);

        $item->save();
        
    }

    public function delete(request $request)
    {
        Item::where('id', $request->id)->delete();
        return $request->all();
    }

    public function update(request $request)
    {
        $item = Item::find($request->id);
        $item-> item = $request->value;
        $item->save();
        return $request->all();
    }
}
