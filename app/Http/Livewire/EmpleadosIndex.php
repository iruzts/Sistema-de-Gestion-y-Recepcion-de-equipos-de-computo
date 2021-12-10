<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

//use livewire\WithPagination;

class EmpleadosIndex extends Component
{
  //  use WithPagination;
   // protected $paginationTheme = "bootstrap";
    
    public function render()
    {
        $users = User::paginate();
        return view('livewire.empleados-index',compact('users'));
    }
}
