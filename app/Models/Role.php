<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //modelo de roles 
    protected $fillable = [
        'nombre'
    ];

    public function personas()
    {
        return $this->hasOne(User::class);
    }
}
