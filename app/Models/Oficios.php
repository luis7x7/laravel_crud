<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oficios extends Model
{
    use HasFactory;
    protected $table = 'oficios';
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
    public function Personas()
    {

        return $this->belongsToMany(Personas::class, 'categorias_oficios', 'oficio_id', 'persona_id');

    }

    public function Categorias()
    {

        return $this->belongsToMany(Categoria::class, 'categorias_oficios', 'oficio_id', 'categoria_id');

    }
}