<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_producto';

     /**
     * Get the producto associated with Pedidos.
     */
    public function pedidos() {
        return $this->hasMany(PedidoProducto::class, 'id_producto', 'id_producto');
    }
}
