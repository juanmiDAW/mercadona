<?php

namespace App\Livewire;

use App\Models\Producto;
use Livewire\Component;

class ListadoProductos extends Component
{

    public $producto;
    public $resultadoBusqueda;


    public function mount()
    {
        if($this->producto != ''){
            $this->resultadoBusqueda = Producto::where('codigo', '=', $this -> producto);
        }
    }


    public function render()
    {
        return view('livewire.listado-productos');
    }
}
