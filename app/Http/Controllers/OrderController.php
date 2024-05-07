<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Item;
use  App\Models\Order;

class OrderController extends Controller
{
    public function finish($id) {
        $item = Item::find($id);
        Order::create([
            'user_id' => 1,
            'item_id' => $item->id,
        ]);

        return view('orders.finish', [
            'title' => '購入完了画面',
            'item' => $item,
        ]);
    }
}
