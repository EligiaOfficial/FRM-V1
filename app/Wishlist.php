<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlist';
    protected $guarded = [];

//    protected $fillable = [
//        'name', 'updated_at', 'created_at', 'product_link', 'description', 'price', 'thumbnail_name'
//    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function wishlists(){
        return $this->belongsTo(wishlists::class);
    }
}
