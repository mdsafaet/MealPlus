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



    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
