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
        'parte_infeiror',
        'color_infeiror',
        'calzado',
        'color_calzado',
        'accesorios',
        'persona_id'
    ];

    public function perosn()
    {
        return $this->belongsTo(User::class, 'persona_id');
    }

    public function person()
    {
        return $this->belongsTo(User::class);
    }
}
