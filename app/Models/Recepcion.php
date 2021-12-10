<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recepcion extends Model
{
    use HasFactory;
    public function Equipos(){
        return $this->belongsTo(Equipo::class,'equipos_id');
    }
    public function Marcas(){
        return $this->belongsTo(Marca::class,'marca_id');
    }
    public function Colors(){
        return $this->belongsTo(Color::class,'color_id');
    }
    public function Reparacion(){
        return $this->hasMany(Reparacion::class,'id');
    }
    public function Clientes(){
        return $this->belongsTo(Cliente::class,'cliente_id');
    }
    public function EstadoEquipos(){
        return $this->belongsTo(EstadoEquipo::class,'cliente_id');
    }
}
