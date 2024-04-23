<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
