<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $guarded = [];


   public function category()
   {
      return $this->belongsTo(Category::class);
   }

   public function brand()
   {
      return $this->belongsTo(Brand::class);
   }



   public function productDetail()
   {
      return $this->hasOne(ProductDetail::class);
   }

   public function reviews()
   {
      return $this->hasMany(ProductReview::class);
   }

   public function slider()
   {
      return $this->hasOne(ProductSlider::class);
   }

   public function carts()
{
    return $this->hasMany(ProductCart::class);
}


public function wishes()
{
    return $this->hasMany(ProductWish::class);
}
   
}
