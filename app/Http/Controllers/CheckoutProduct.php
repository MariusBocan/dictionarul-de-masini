<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Categories;
use App\Models\Products;
use App\Http\Controllers\ProductsController;

class CheckoutProductController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function store(Request $checkoutProdcut)
    {
        $checkoutProdcut->validate([
            'checkout_id' => ['required', 'integer', 'max:500'],
            'product_id' => ['required', 'integer', 'max:500'],
            'quantity' => ['required', 'integer', 'max:500'],
            'price' => ['required', 'integer', 'max:500']
        ]);

        $checkoutProdcut = Categories::create([
            'checkout_id' => $checkoutProdcut->checkout_id,
            'product_id' => $checkoutProdcut->product_id,
            'quantity' => $checkoutProdcut->quantity,
            'price' => $checkoutProdcut->price
        ]);

        return redirect('/shop');
    }

    /**
     * Listeaza categoriile
     */
    public function index(Request $categories)
    {
        
    }

    

   
}