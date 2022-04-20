<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    /**
     * Get the producto associated with Pedidos.
     */
    public function productos() {
        return $this->hasMany(PedidoProducto::class, 'id_pedido', 'id_pedido');
    }
}
