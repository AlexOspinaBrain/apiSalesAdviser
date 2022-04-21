<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoProducto extends Model
{
    use HasFactory;
    
    protected $table = 'pedido_productos';

    /**
     * Get the Producto associated with the Pedido.
     */
    public function producto() {
        return $this->hasOne(Producto::class, 'id_producto', 'id_producto');
    }
}
