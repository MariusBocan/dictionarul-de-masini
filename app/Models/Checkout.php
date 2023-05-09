<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Checkout extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'address',
        'user_id',
        'product_id',
        'final_price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function checkoutProducts()
    {
        return $this->hasMany(CheckoutProduct::class);
    }

    public function products()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
