<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;

    protected $table = 'pedidos'; 

    protected $fillable = [
        'nombre_medicamento',
        'tipo_medicamento_id',
        'distribuidor_id',
        'sucursal_id',
        'cantidad'
    ];

    // Relación con el modelo Sucursal
    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }

    // Relación con el modelo Distribuidor
    public function distribuidor()
    {
        return $this->belongsTo(Distribuidor::class);
    }

    // Relación con el modelo TipoMedicamento
    public function tipoMedicamento()
    {
        return $this->belongsTo(TipoMedicamento::class);
    }
}
