<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;

class InvoiceProduct extends Model
{
     protected $guarded = [];


        public function invoice()
    {
        return $this->belongsTo(Invoice::class);    

    }

     public function category()
    {
        return $this->belongsTo(Category::class);    

    }

     public function brand()
    {
        return $this->belongsTo(Brand::class);    

    }
}
