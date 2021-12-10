<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparacion extends Model
{
    use HasFactory;

    public function DetalleReparacions(){
        return $this->belongsTo(DetalleReparacion::class,'id');
    }
    public function Tecnicos(){
        return $this->belongsTo(Tecnico::class,'id');
    }
    public function Recepcion(){
        return $this->belongsTo(Recepcion::class,'recepcion_id');
    }
}
