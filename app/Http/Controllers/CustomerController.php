<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Cart;
use App\Models\OrderDetail;
use App\Models\Products;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
 /**
     * Add customer.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'min:10','max:25'],
            'email' => ['required', 'email', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255']
        ]);

        // creare client = inserare in tabela customers
        $customer = Customer::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'email' => $request->email,
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address
        ]);

        // creare comanda = inserare in tabela orders
        $order = Order::create([
            'customer_id' => $customer->id,
            'delivery_date'=> date_add(now(), date_interval_create_from_date_string("7 days")),
            'order_date' => now(),
            'delivery_adress' => $customer->country . ", " . $customer->city . ", " . $customer->address,
            'status' => "pending",
            'price' => Auth::user()->cartPrice,
            'comments' => ""
        ]);
        // adaugare produse la comanda = inserare in tabela order_details
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        foreach ($carts as $cart) {
            $orderDetail = OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'price_per_unit' => $cart->product->price
            ]);
        }

        // scadere din stoc = editare in tabela products

        foreach ($carts as $cart) {
            $product = Products::where("id", $cart->product_id)->first();
            $product->quantity = $product->quantity - $cart->quantity;
            $product->save();
        }

        // golire cos = stergere din tabela carts
        foreach ($carts as $cart) {
            $cart->delete();  
        }

        Session::flash('success', 'Comanda dvs. a fost trimisa cu succes! Multumim!');
        return redirect('/shop');
    }

}
