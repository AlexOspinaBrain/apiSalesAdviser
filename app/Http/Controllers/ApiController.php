<?php

namespace App\Http\Controllers;

use App\Models\Asesor;


class ApiController extends Controller
{
    /**
     * Fetch sales adviser Info
     * Return an object JSON with 'success' and 'data' keys 
     * where 'data' contanis the expected array 
     *
     * @return object $data json
     */
    public function getSalesAdviserInfo() {

        $salesAdvisers = Asesor::with('clientes')->get();

        $arrayData = [];

        foreach ($salesAdvisers as $salesAdviser) {

            $clientes = [];
            foreach ($salesAdviser->clientes as $cliente) {
                $clientes[] = [
                    "id_cliente" => $cliente->name,
                ];
            }

            $arrayData[] = [
                "codigo_asesor" => $salesAdviser->codigo_asesor,
                "name" => $salesAdviser->name,
                "clientes_asignados" => $salesAdviser->clientes_asignados,
                "total_pedidos" => $salesAdviser->total_pedidos,
                "clientes" => $clientes,
            ];
        }

        $data = ['success' => true, 'data' => $arrayData];

        return response()->json($data);
    }
}
