<?php

namespace App\Models;

use App\Models\CustomerProfile;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
        protected $guarded = [];


        public function product(){
            return $this->belongsTo(Product::class);
         }


         public function customerProfile(){
            return $this->belongsTo(CustomerProfile::class);
         }


    

     
}
