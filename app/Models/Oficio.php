<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oficio extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'folio_oficio',
        'elabora',
        'estatus_oficio',
        'fecha_oficio',
        'fecha_recepcion',
        'asunto',
        'firma',
        'dependencia',
        'dirigido_a',
        'cargo',
        'tipo_oficio',
        'oficio_procedencia',
        'turnado_a',
        'recibe',
        'es_dirigido',
        'con_copia',
        'girado_delegacion',
        'observaciones',
        'estatus',
    ];
}
