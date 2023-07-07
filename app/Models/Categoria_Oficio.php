<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria_Oficio extends Model
{
    use HasFactory;

    protected $table = 'categorias_oficios';

    protected $fillable = [

        'oficio_id',
        'categoria_id'

    ];

    protected $primaryKey = 'id';

    protected $hidden = [

        'created_at',
        'updated_at',
        'deleted_at'

    ];
}