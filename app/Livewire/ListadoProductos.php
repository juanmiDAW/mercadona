<?php

namespace App\Livewire;

use App\Models\Producto;
use Livewire\Component;
use Psy\CodeCleaner\AssignThisVariablePass;

class ListadoProductos extends Component
{

    public $producto;
    public $resultadoBusqueda;
    public $lista;


    public function mount()
    {
        $this->resultadoBusqueda = collect();
        $this->lista = collect();
    }

    public function anyadir($id) {

        $producto = Producto::where('id', $id)->first();
        $this->lista->push($producto);
    }

    public function eliminar($indice){
        $this->lista->forget($indice);
        $this->lista = $this->lista->values(); 
    }

    public function updatedProducto()
    {
        if ($this->producto != '') {
            $this->resultadoBusqueda = Producto::where('codigo', 'like', '%' . $this->producto . '%')->get();
        } else {
            $this->resultadoBusqueda = collect();
        }
    }
    public function render()
    {
        return view('livewire.listado-productos');
    }
}
