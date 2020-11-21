<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['id', 'title', 'user_id', 'status', 'photo', 'description', 'price', 'created_at', 'updated_at'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'product_id', 'id');
    }

    public function carts(){
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }

    public function orders(){
        return $this->hasMany(Order::class, 'product_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');

    }

}
