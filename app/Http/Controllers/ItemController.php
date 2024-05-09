<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Requests\ItemRequest;
use  App\Http\Requests\ImageRequest;
use  App\Models\Item;
use  App\Models\Category;

class ItemController extends Controller
{
    public function index() {
        $items = Item::where('user_id', '!=', \Auth::user()->id)->latest()->get();

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

    public function edit($id) {
        $item = Item::find($id);

        return view('items.edit', [
            'title' => '商品編集画面',
            'item' => $item,
            'categories' => Category::select('id', 'name')->get(),
        ]);
    }

    public function update(ItemRequest $request, $id) {
        $item = Item::find($id);
        $item->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
        ]);

        return redirect()->route('users.exhibitions', \Auth::user()->id);
    }

    public function editImage($id) {
        $item = Item::find($id);

        return view('items.edit_image', [
            'title' => '商品画像の変更',
            'item' => $item,
        ]);
    }

    public function updateImage(ImageRequest $request, $id) {
        $path = '';
        $image = $request->file('image');

        //画像がアップされていたら、pathを取得する、ここで保存処理完了
        if ($image !== null) {
            $path = $image->store('photos', 'public');
        }

        //itemの画像があれば、削除する
        $item = Item::find($id);
        if ($item->image !== null) {
            \Storage::disk('public')->delete($item->image);
        }
        
        //pathをitemのDBに保存する
        $item->update([
            'image' => $path,
        ]);

        return redirect()->route('users.exhibitions', \Auth::user()->id);
    }

    public function confirm($id) {
        return view('items.confirm', [
            'title' => '購入確認画面',
            'item' => Item::find($id),
        ]);
    }

    public function exhibition() {
        $user = \Auth::user();
        $items = $user->items()->latest()->get();

        return view('items.exhibition', [
            'title' => '出品商品一覧',
            'user' => $user,
            'items' => $items,
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
        $user_id = \Auth::user()->id;

        Item::create([
            'name' => $request->name,
            'user_id' => $user_id,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'image' => $path,
        ]);

        return redirect()->route('items.index');
    }

    public function destroy($id) {
        $item = Item::find($id);
        if ($item->image !== null) {
            \Storage::disk('public')->delete($item->image);
        }
        $item->delete();

        return redirect()->route('items.index');
    }
}
