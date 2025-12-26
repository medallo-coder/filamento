<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Outfit extends Model
{
    // Modelo de outfits
    protected $fillable = [
        'parte_superior',
        'color_superior',
        'parte_inferior',
        'color_infeiror',
        'calzado',
        'color_calzado',
        'accesorios',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
