<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Requests\ItemRequest;
use  App\Models\Item;

class ItemController extends Controller
{
    public function index() {
        return view('items.index');
    }

    public function exhibition() {
        return view('items.exhibition', [
            'title' => '出品商品一覧',
        ]);
    }

    public function create() {
        return view('items.create', [
            'title' => '商品を出品',
        ]);
    }

    public function store(ItemRequest $request) {
        Item::create([
            'name' => $request->name,
            'user_id' => '1',
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'image' => '',
        ]);

        return redirect()->route('items.index');
    }
}
