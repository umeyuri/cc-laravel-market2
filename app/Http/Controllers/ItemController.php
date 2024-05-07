<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Requests\ItemRequest;
use  App\Models\Item;
use  App\Models\Category;

class ItemController extends Controller
{
    public function index() {
        $items = Item::all();

        return view('items.index', [
            'items' => $items,
        ]);
    }

    public function show($id) {
        $item = Item::find($id);
        return view('items.show', [
            'title' => '商品詳細',
            'item' => $item,
        ]);
    }

    public function confirm($id) {
        return view('items.confirm', [
            'title' => '購入確認画面',
            'item' => Item::find($id),
        ]);
    }

    public function exhibition() {
        return view('items.exhibition', [
            'title' => '出品商品一覧',
        ]);
    }

    public function create() {
        $categories = Category::query()->select('id', 'name')->get();

        return view('items.create', [
            'title' => '商品を出品',
            'categories' => $categories,
        ]);
    }

    public function store(ItemRequest $request) {
        $path = '';
        
        $image = $request->file('image');
        if (isset($image)) {
            $path = $image->store('photos', 'public');
        }

        Item::create([
            'name' => $request->name,
            'user_id' => '1',
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'image' => $path,
        ]);

        return redirect()->route('items.index');
    }
}
