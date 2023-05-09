<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Cart;
use App\Models\Products;

class CartController extends Controller
{
    public function store(int $id) 
    {
        // aducem din baza de date produsul pe care il adaugam in cos
        $product = Products::find($id); 
    
        // verificam daca mai avem in cos acest produs
        $existingCart = Cart::where('user_id', Auth::user()->id)
            ->where('product_id', $id)
            ->first();

        // daca mai avem produsul in cos
        if ($existingCart) {
            // si daca produsul mai este in stoc
            if ($product->quantity >= $existingCart->quantity + 1) {
                // crestem cantitatea produsului din cos
                $existingCart->quantity ++;
                $existingCart->save();
            }
        // daca nu mai am produsul in cos
        } else {
            // daca magazinul are cel putin un produs
            if ($product->quantity >= 1) {
                // adaug produsul in cos cu cantitate 1
                $cart = Cart::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $id,
                    'quantity' => 1
                ]);
            }
        }
        return redirect('/cart');
    }

    // listeaza toate produsele din cos
    public function index()
    {
        // se duce in baza de date(tabela carts) si aduce toate produsele
        // din cos user-ului logat
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        
        //pentru fiecare produs din cos
        foreach($carts as $cart) {
            // daca produsul nu mai este pe stoc
            if($cart->product->quantity == 0) {
                // il stergem din cos
                $cart->delete();
            }
            // in caz contrar
            //daca cantitatea din cos este mai mare decat stocul
            else if($cart->quantity > $cart->product->quantity) {
                //lasam in cos doar numarul de produse din stoc
                $cart->quantity = $cart->product->quantity;
                // salvam
                $cart->save();
            }
        }

        return view('cart', [
            'carts' => $carts
        ]);
    }

    // sterge produsul din cos
    public function destroy(int $id)
    {
        Cart::where('id', $id)->delete();
        return redirect('/cart');
    }

    // creste cantitatea produsului din cos
    public function increaseQuantity(int $productId)
    {
        // stocam in variabila $cart produsul cu id-ul $productId din cosul utilizatorului logat
        // Auth::user()->id este id-ul utilizatorului logat
        // am ales sa folosim ->first() deoarece exista o singura relatie intre produs si cos
        // alternativa ->first() este ->get() insa astfel obtineam o lista cu un singur element
        $cart = Cart::where('user_id', Auth::user()->id)
            ->where('product_id', $productId)->first();
       
        // in variabila $product aducem din baza de date produsul cu id-ul $productId
        // $product = Product::find($productId); cand cautam dupa cheia primara (id) putem folosi find()
        $product = Products::where('id', $productId)->first();
     
        // verificam daca stocul este mai mare decat "cat am eu in cos + 1"
        if($product->quantity >= $cart->quantity + 1) {
            // crestem cantitatea produsului din cos
            $cart->quantity ++;
            // salvam produsul in cos
            $cart->save();
        }
        // facem redirect catre pagina cosului
        return redirect('/cart');
    }

    // scadem cantitatea produsului din cos
    public function decreaseQuantity(int $productId)
    {
        // stocam in variabila $cart produsul cu id-ul $productId din cosul utilizatorului logat
        // Auth::user()->id este id-ul utilizatorului logat
        // am ales sa folosim ->first() deoarece exista o singura relatie intre produs si cos
        // alternativa ->first() este ->get() insa astfel obtineam o lista cu un singur element
        $cart = Cart::where('user_id', Auth::user()->id)
            ->where('product_id', $productId)->first();
     
        // verificam daca avem cel putin un produs in cos
        if($cart->quantity > 1) {
            // scadem cantitatea produsului din cos
            $cart->quantity --;
            // salvam produsul in cos
            $cart->save();
        }
        // facem redirect catre pagina cosului
        return redirect('/cart');
    }
}

