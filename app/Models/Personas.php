<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    use HasFactory;

    protected $table = 'personas';

    protected $fillable = array(

        'apellido_paterno',
        'apellido_materno',
        'nombre',
        'celular',
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

        return $this->belongsToMany(Oficios::class, 'personas_oficios', 'persona_id', 'oficio_id');

    }
}