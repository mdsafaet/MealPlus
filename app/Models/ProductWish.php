<?php

namespace App\Models;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ProductWish extends Model
{
        protected $guarded = [];
    
        public function user(){
            return $this->belongsTo(User::class);
        }
    
        public function product(){
            return $this->belongsTo(Product::class);
        }
}
