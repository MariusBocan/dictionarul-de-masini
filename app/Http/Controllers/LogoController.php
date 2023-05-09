<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Logo;

class LogoController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function store(Request $request)
    {
        $request->validate([
            'manufacturer' => ['required', 'string', 'max:500'],
            'path' => ['required', 'string', 'max:500']
        ]);

        $logos = Logo::create([
            'manufacturer' => $request->manufacturer,
            'path' => $request->path
        ]);

        return redirect('/home');
    }

    /**
     * Update the user's profile information.
     */
    public function index(Request $request)
    {
        $logos = Logo::all();
        return view('welcome', ['logo'=>$logos]);
    }
}
