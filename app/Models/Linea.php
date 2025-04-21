<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    /** @use HasFactory<\Database\Factories\LineaFactory> */
    use HasFactory;

    protected $fillable = ['ticket_id', 'producto_id'];

    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}
