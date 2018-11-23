<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Item;
Use Auth;

class ListController extends Controller
{

    public function index() 
    {   
        //$items = DB::table('items')->where('user_id')->value(auth()->user()->id);
        //$items = Item::all();
        $id = Auth::user()->id;
        $items = Item::where('user_id', $id)->get();
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
