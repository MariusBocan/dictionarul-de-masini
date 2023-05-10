<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Products;
use App\Models\Categories;

class ProductsController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function store(Request $product)
    {
        $product->validate([
            'name' => ['required', 'string', 'max:500'],
            'brand' => ['required', 'string', 'max:500'],
            'category' => ['required', 'string', 'max:500'],
            'description' => ['required', 'string', 'max:500'],
            'quantity' => ['required', 'string', 'max:500'],
            'price' => ['required', 'string', 'max:500'],
            'image' => ['required', 'string', 'max:500'],
            'categories_id' => ['required', 'string', 'max:500']
        ]);

        $product = Products::create([
            'name' => $product->name,
            'brand' => $product->brand,
            'category' => $product->category,
            'description' => $product->description,
            'quantity' => $product->quantity,
            'price' => $product->price,
            'image' => $product->image,
            'categories_id' => $product->categories_id
        ]);

        return redirect('/shop');
    }

    /**
     * Listeaza categoriile
     */

     public function indexx(Request $request, string $categoryName) {
        $category = Categories::where('category', $categoryName)->first();
        
         $products = $category->products;

           return view('products', ['product_id'=>$products]);
     }
}