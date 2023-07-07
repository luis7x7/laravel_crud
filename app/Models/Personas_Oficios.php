<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas_Oficios extends Model
{
    use HasFactory;

    protected $table = 'personas_oficios';

    protected $fillable = [

        'persona_id',
        'oficio_id'

    ];

    protected $primaryKey = 'id';

    protected $hidden = [

        'created_at',
        'updated_at',
        'deleted_at'

    ];
}