<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Http\Response;
use App\Models\Engine;
use App\Models\Models as ModelsModel;

class CarEnginesController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function store(Request $engine)
    {
        $engine->validate([
            'about_model' => ['required', 'string', 'max:500'],
            'engine' => ['required', 'string', 'max:500'],
            'fuel' => ['required', 'string', 'max:500'],
            'year' => ['required', 'string', 'max:500'],
            'engine_size' => ['required', 'string', 'max:500'],
            'carousel1' => ['required', 'string', 'max:500'],
            'carousel2' => ['required', 'string', 'max:500'],
            'carousel3' => ['required', 'string', 'max:500'],
            'model_id' => ['required', 'string', 'max:500']
        ]);

        $engine = Engine::create([
            'about_model' => $engine->about_model,
            'engine' => $engine->engine,
            'fuel' => $engine->fuel,
            'year' => $engine->year,
            'engine_size' => $engine->engine_size,
            'carousel1' => $engine->carousel1,
            'carousel2' => $engine->carousel2,
            'carousel3' => $engine->carousel3,
            'model_id' => $engine->model_id,
        ]);

        return redirect('/engine');
    }

    /**
     * Listeaza categoriile
     */



// public function showEngines($id)
// {
//     return $this->index($id);
// }

public function showEngines(Request $request, string $brandId, string $modelId) {
    $engineCount = Engine::count(); // Get the count of rows in the `engine` table

    if ($modelId > $engineCount) {
        abort(Response::HTTP_NOT_FOUND);
    }

    $models = ModelsModel::where('id', $modelId)->first();
    
     $engines = $models->engines;

       return view('engines', ['engines'=>$engines]);
 }

 public function showSpecs(Engine $engine)
    {
        $specs = $engine->specs;
        return view('specs', compact('specs'));
    }
}
