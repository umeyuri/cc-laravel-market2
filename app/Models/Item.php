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

}
