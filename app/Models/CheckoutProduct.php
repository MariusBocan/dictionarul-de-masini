<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class CheckoutProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'checkout_id',
        'prodcut_id',
        'quantity',
        'price'
    ];

    public function checkout()
    {
        return $this->belongsTo(Checkout::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
