<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesor extends Model
{
    use HasFactory;

    /**
     * Get the Cliente associated with the Asesor.
     */
    public function clientes() {
        return $this->hasMany(Cliente::class, 'codigo_asesor', 'codigo_asesor');
    }
}
