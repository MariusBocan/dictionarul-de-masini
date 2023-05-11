<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Models extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'brand',
        'model',
        'about_brand',
        'image',
        'brand_id'
    ];

    use HasFactory;
    function brand()
    {
    return $this->belongsTo('App\Models\Logo', 'brand_id');
    }
    public function engines()
    {
        return $this->hasMany('App\Models\Engine');
    }
}
