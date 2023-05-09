<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // atributele sunt proprietati ale modelului (stau in "umbra", nu sunt salvate in baza de date)
    // atributele se numesc getNumeAttribute
    public function getCartPriceAttribute() 
    {
        // initial pretul cosului de cumparaturi este 0
        $cartPrice = 0;
        // in variabila carts stocam cosul de cumparaturi al userului curent
        $carts = Cart::where('user_id', $this->id)->get();
        
        // se parcurge variabila $carts element cu element
        foreach ($carts as $cart) {
            // stocam in variabila $product produsul curent din cos
            $product = Products::where('id', $cart->product_id)->first();
            // adunam la pretul cosului rezultatul inmultirii dintre
            // pretul produsului si cantiatea din cos
            $cartPrice = $cartPrice + ($product->price * $cart->quantity);
        }
        
        // returnam pretul total al cosului
        return $cartPrice;
    }

    public function getProductsNumberAttribute()
    {
        $productsNumber = 0;
        // in variabila carts stocam cosul de cumparaturi al userului curent
        $carts = Cart::where('user_id', $this->id)->get();
        foreach ($carts as $cart) {
            $productsNumber = $productsNumber + $cart->quantity;
        }
        return $productsNumber;
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function checkouts()
    {
        return $this->hasMany(Checkout::class);
    }
}
