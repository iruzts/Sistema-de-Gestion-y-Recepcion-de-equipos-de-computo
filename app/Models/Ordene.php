<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordene extends Model
{
    use HasFactory;
    public function Clientes(){
        return $this->belongsTo(Cliente::class,'cliente_id');
    }
    public function Equipos(){
        return $this->belongsTo(Equipo::class,'equipos_id');
    }
    public function Marcas(){
        return $this->belongsTo(Marca::class,'marca_id');
    }
    public function Colors(){
        return $this->belongsTo(Color::class,'color_id');
    }
    public function User(){
        return $this->belongsTo(User::class,'usuario_id');
    }
}
