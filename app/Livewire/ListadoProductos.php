<?php

namespace App\Livewire;

use App\Models\Linea;
use App\Models\Producto;
use App\Models\Ticket;
use Livewire\Component;
use Psy\CodeCleaner\AssignThisVariablePass;

class ListadoProductos extends Component
{

    public $producto;
    public $resultadoBusqueda;
    public $lista;
    public $modal = false;
    public $tarjeta;


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

    public function anular(){
        $this->lista = collect();
        return redirect()->route('inicio');
    }

    public function updatedProducto()
    {
        if ($this->producto != '') {
            $this->resultadoBusqueda = Producto::where('codigo', 'like', '%' . $this->producto . '%')->get();
        } else {
            $this->resultadoBusqueda = collect();
        }
    }

    public function guardarSesion(){
        session(['lista' => $this->lista]);
    }

    public function mostrarModal(){
        $this->modal = !$this->modal; 
    }

    public function anyadirTarjeta(){
        $validate = $this->validate([
            'tarjeta' => 'required|numeric|digits:16',
        ]);

        $this->modal = false;

        $ticket = Ticket::create($validate);
        foreach ($this->lista as $producto) {
            Linea::create([
                'ticket_id' => $ticket->id,
                'producto_id' => $producto->id,
            ]);
        }
        return redirect()->route('finalizar');
    }

    public function render()
    {
        return view('livewire.listado-productos');
    }
}
