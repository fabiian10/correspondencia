<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Correspondencia extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'folio_entrada',
        'elabora',
        'estatus_oficio',
        'fecha_elaboracion',
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
