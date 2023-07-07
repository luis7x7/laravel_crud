<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    protected $fillable = array(
        'nombre',
        'descripcion',
        'estado_registro'
    );

    protected $primaryKey = 'id';

    protected $hidden = [

        'created_at',
        'updated_at',
        'deleted_at'

    ];

    public function Oficios()
    {

        return $this->belongsToMany(Oficios::class, 'categorias_oficios', 'categoria_id', 'oficio_id');

    }
}