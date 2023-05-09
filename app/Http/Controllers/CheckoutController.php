<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Products;
use App\Http\Controllers\CartController;
use App\Models\User;
use App\Models\Checkout;
use App\Models\Cart;
use App\Models\CheckoutProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{

    public function index(Request $checkout)
    {
        $user = auth()->user();
        $checkouts = Checkout::where('user_id', $user->id)->with('products')->get();
        return view('checkout', ['checkouts' => $checkouts]);
    }
    // public function store(Request $request)
    // {
    //     // Retrieve user instance
    //     $user = Auth::user();

    //     // Retrieve cart instances
    //     $carts = Cart::whereIn('id', Session::get('cart_ids', []))
    //         ->with('product')
    //         ->get();

    //     // Calculate the final price
    //     $final_price = $carts->sum(function ($cart) {
    //         return $cart->product->price * $cart->quantity;
    //     });

    //     // Create a new checkout instance
    //     $checkout = $user->checkouts()->create([
    //         'firstname' => $request->input('firstname'),
    //         'lastname' => $request->input('lastname'),
    //         'email' => $request->input('email'),
    //         'phone' => $request->input('phone'),
    //         'address' => $request->input('address'),
    //         'final_price' => $final_price,
    //     ]);

    //     // Create and associate the checkout product instances
    //     foreach ($carts as $cart) {
    //         $checkout_product = new CheckoutProduct([
    //             'product_id' => $cart->product->id,
    //             'quantity' => $cart->quantity,
    //             'price' => $cart->product->price,
    //         ]);
    //         $checkout->checkout_products()->save($checkout_product);
    //     }

    //     // Clear the cart ids from the session
    //     Session::forget('cart_ids');

    //     // Redirect to thank you page or order summary page
    //     return redirect()->route('dashboard');
    // }
    public function store(Request $request)
{
    // retrieve user id from the authenticated user
    $user_id = auth()->id();

    // retrieve cart ids from the session or form input
    $cart_ids = $request->session()->get('cart_ids', []);

    // retrieve user instance
    $user = User::find($user_id);

    // get the carts and their associated products using a join operation
    $carts = Cart::whereIn('id', $cart_ids)
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->select('carts.*', 'products.price')
        ->get();

    // create a new checkout instance
    $checkout = new Checkout([
        'firstname' => $request->input('firstname'),
        'lastname' => $request->input('lastname'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
        'address' => $request->input('address'),
        'product_id' => $carts->first()->product_id // set the first cart's product_id
    ]);

    // associate the carts with the checkout
    foreach ($carts as $cart) {
        $checkout_product = new CheckoutProduct([
            'product_id' => $cart->product_id,
            'price' => $cart->price,
        ]);
        $checkout->checkout_products()->save($checkout_product);
    }

    // calculate the final price
    $final_price = $carts->sum('price');
    $checkout->final_price = $final_price;

    // save the checkout and its associated checkout products
    $user->checkouts()->save($checkout);

    // clear the cart ids from the session
    $request->session()->forget('cart_ids');

    // redirect to thank you page or order summary page
    return redirect()->route('checkout.thankyou');
}






}