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
use App\Models\Spec;
use App\Models\Models as ModelsModel;

class SpecsController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function store(Request $specs)
    {
        $specs->validate([
            'engine_id' => ['required', 'string', 'max:500'],
            'year' => ['required', 'string', 'max:500'],
            'brand' => ['required', 'string', 'max:500'],
            'model' => ['required', 'string', 'max:500'],
            'engine' => ['required', 'string', 'max:500'],
            'body_type' => ['required', 'string', 'max:500'],
            'doors' => ['required', 'string', 'max:500'],
            'seats' => ['required', 'string', 'max:500'],
            'lenght' => ['required', 'string', 'max:500'],
            'width' => ['required', 'string', 'max:500'],
            'height' => ['required', 'string', 'max:500'],
            'wheelbase' => ['required', 'string', 'max:500'],
            'weight' => ['required', 'string', 'max:500'],
            'engine_size' => ['required', 'string', 'max:500'],
            'engine_kw' => ['required', 'string', 'max:500'],
            'engine_hp' => ['required', 'string', 'max:500'],
            'torque' => ['required', 'string', 'max:500'],
            'fuel_supply' => ['required', 'string', 'max:500'],
            'cylinders' => ['required', 'string', 'max:500'],
            'valves' => ['required', 'string', 'max:500'],
            'gears' => ['required', 'string', 'max:500'],
            'fuel_capacity' => ['required', 'string', 'max:500'],
            'eco_standard' => ['required', 'string', 'max:500'],
            'tires' => ['required', 'string', 'max:500'],
            'max_speed' => ['required', 'string', 'max:500'],
            'acceleration' => ['required', 'string', 'max:500'],
            'fuel_urban' => ['required', 'string', 'max:500'],
            'fuel_extra' => ['required', 'string', 'max:500'],
            'fuel_comb' => ['required', 'string', 'max:500']
        ]);

        $specs = Spec::create([
            'engine_id' => $specs->engine_id,
            'year' => $specs->year,
            'brand' => $specs->brand,
            'model' => $specs->model,
            'engine' => $specs->engine,
            'body_type' => $specs->body_type,
            'doors' => $specs->doors,
            'seats' => $specs->seats,
            'lenght' => $specs->lenght,
            'width' => $specs->width,
            'height' => $specs->height,
            'wheelbase' => $specs->wheelbase,
            'weight' => $specs->weight,
            'engine_size' => $specs->engine_size,
            'engine_kw' => $specs->engine_kw,
            'engine_hp' => $specs->engine_hp,
            'torque' => $specs->torque,
            'fuel_supply' => $specs->fuel_supply,
            'cylinders' => $specs->cylinders,
            'valves' => $specs->valves,
            'gears' => $specs->gears,
            'fuel_capacity' => $specs->fuel_capacity,
            'eco_standard' => $specs->eco_standard,
            'tires' => $specs->tires,
            'max_speed' => $specs->max_speed,
            'acceleration' => $specs->acceleration,
            'fuel_urban' => $specs->fuel_urban,
            'fuel_extra' => $specs->fuel_extra,
            'fuel_comb' => $specs->fuel_comb
        ]);

        return redirect('/specs');
    }



    public function showSpecs($id)
{
    $engineCount = Engine::count(); // Get the count of rows in the `engine` table

    if ($id > $engineCount) {
        abort(Response::HTTP_NOT_FOUND);
    }

    $engine = Engine::findOrFail($id);
    $specs = $engine->specs;
    $aboutModel = $engine->about_model;
    $carousel1 = $engine->carousel1;
    $carousel2 = $engine->carousel2;
    $carousel3 = $engine->carousel3;

    return view('specs', compact('engine', 'specs', 'aboutModel', 'carousel1', 'carousel2', 'carousel3'));
}
}
