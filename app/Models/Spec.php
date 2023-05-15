<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Spec extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'year',
        'engine_id',
        'brand',
        'model',
        'engine',
        'body_type',
        'doors',
        'seats',
        'lenght',
        'width',
        'height',
        'wheelbase',
        'weight',
        'engine_size',
        'engine_kw',
        'engine_hp',
        'torque',
        'fuel_supply',
        'cylinders',
        'valves',
        'gears',
        'fuel_capacity',
        'eco_standard',
        'tires',
        'max_speed',
        'acceleration',
        'fuel_urban',
        'fuel_extra',
        'fuel_comb'
    ];

    use HasFactory;
    // public function spec()
    // {
    //     return $this->belongsTo('App\Models\Engine', 'id');
    // }

    public function engine()
    {
        return $this->belongsTo(Engine::class);
    }
}
