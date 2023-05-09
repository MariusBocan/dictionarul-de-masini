<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Models;
use App\Models\Logo;

class ModelsController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function store(Request $model)
    {
        $model->validate([
            'brand' => ['required', 'string', 'max:500'],
            'model' => ['required', 'string', 'max:500'],
            'about_brand' => ['required', 'string', 'max:500'],
            'image' => ['required', 'string', 'max:500'],
            'brand_id' => ['required', 'string', 'max:500']
        ]);

        $model = Models::create([
            'brand' => $model->brand,
            'model' => $model->model,
            'about_brand' => $model->about_brand,
            'image' => $model->image,
            'brand_id' => $model->brand_id
        ]);

        return redirect()->route('models.index', ['brand_id' => $model->brand_id]);
    }

    /**
     * Listeaza modelele
     */
    public function indexx(string $brand_id) {
        $brand = Logo::findOrFail((string) $brand_id);
        $models = $brand->models;
        return view('brand-models', ['models'=>$models]);
    }

}