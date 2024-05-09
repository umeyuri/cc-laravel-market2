<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Item extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'user_id',
        'description',
        'category_id',
        'price',
        'image',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    //中間テーブルとのリレーションをまず記載
    public function orders() {
        return $this->hasMany(Order::class);
    }
    //ordersテーブルを介してUserとItemテーブルが多対多
    public function orderUsers() {
        return $this->belongsToMany(User::class, 'orders');
    }

    public function isOrderd($item_id) {
        return $this->orders()->where('item_id', $item_id)->exists();
    }

    //likeテーブルを介しての多対多のリレーション設定
    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function likedUsers() {
        return $this->belongsToMany(User::class, 'likes');
    }

    //特定のユーザーにいいねされているかどうか
    public function isLikedBy($user_id) {
        return $this->likes()->where('user_id', $user_id)->exists();
    }
}
