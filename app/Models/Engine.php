<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Engine extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'about_model',
        'engine',
        'fuel',
        'year',
        'engine_size',
        'carouse1',
        'carouse2',
        'carouse3',
        'model_id',
    ];

    use HasFactory;
    public function model()
    {
        return $this->hasMany('App\Models\Models', 'model_id');
    }

    public function specs()
    {
        return $this->hasMany('App\Models\Spec');
    }
}
