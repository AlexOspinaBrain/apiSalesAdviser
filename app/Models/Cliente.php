<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    /**
     * Get the Pedido associated with the Cliente.
     */
    public function pedidos() {
        return $this->hasMany(Pedido::class , 'id_cliente', 'id_cliente');
    }
}
