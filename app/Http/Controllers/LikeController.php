<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Item;
use  App\Models\Like;

class LikeController extends Controller
{
    public function index() {
        $likes = \Auth::user()->likeItems()->withPivot('created_at')->orderByDesc('likes.created_at')->get();
        return view('likes.index', [
            'title' => 'お気に入り一覧',
            'likes' => $likes,
        ]);
    }

    public function toggleLike($id) {
        $user = \Auth::user();
        $item = Item::find($id);
        //いいねの取り消し
        if ($item->isLikedBy($user->id)) {
            $item->likes()->where('user_id', $user->id)->first()->delete();
        } else {
        //いいねの設定
            Like::create([
                'user_id' => $user->id,
                'item_id' => $item->id,
            ]);
        }

        return redirect()->route('items.index');
    }
}
