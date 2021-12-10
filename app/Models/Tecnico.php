<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    use HasFactory;
    
    public function Reparacions(){
        return $this->hasMany(Reparacion::class,'id');
    }
}
