<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Characteristic extends Model
{
    use HasFactory;

    protected $table = 'characteristics';

    protected $primaryKey = 'id_caracteristica';

    protected $fillable = [
        'sexo',
        'edad',
        'estatura',
        'complexion',
        'color_piel',
        'color_ojos',
        'color_cabello',
        'tipo_cabello',
        'senas_particulares',
        'implantes',
        'protesis',
        'senas_odontologicas',
        'user_id',
    ];

    /**
     * Relación: una característica pertenece a un usuario
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
