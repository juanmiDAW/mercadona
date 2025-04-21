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
        $this->resultadoBusqueda = collect();

    }

    public function updatedProducto()
    {
        if($this->producto != ''){
            $this->resultadoBusqueda = Producto::where('codigo', 'like', '%'.$this->producto.'%')->get();
        }else{
            $this->resultadoBusqueda = collect();
        }
    }
    public function render()
    {
        return view('livewire.listado-productos');
    }
}
