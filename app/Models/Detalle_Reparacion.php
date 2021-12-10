<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Reparacion extends Model
{
    use HasFactory;
    
    public function Reparacions(){
        return $this->belongsTo(Reparacions::class,'id');
    }
}
