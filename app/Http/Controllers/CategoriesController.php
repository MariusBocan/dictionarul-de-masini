<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Http\Response;
use App\Models\Categories;
use App\Models\Products;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function store(Request $category)
    {
        $category->validate([
            'name' => ['required', 'string', 'max:500'],
            'starting_price' => ['required', 'string', 'max:500'],
            'path1' => ['required', 'string', 'max:500'],
            'path2' => ['required', 'string', 'max:500'],
            'path3' => ['required', 'string', 'max:500']
        ]);

        $category = Categories::create([
            'name' => $category->name,
            'starting_price' => $category->starting_price,
            'path1' => $category->path1,
            'path2' => $category->path2,
            'path3' => $category->path3,
        ]);

        return redirect('/shop');
    }

    /**
     * Listeaza categoriile
     */
    public function index(Request $categories)
    {
        $categories = Categories::all();
        return view('shop', ['categories'=>$categories]);
    }
}