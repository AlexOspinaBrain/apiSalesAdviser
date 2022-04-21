<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\PedidoProducto;


class ApiController extends Controller
{
    /**
     * Fetch sales adviser Info
     * Return an object JSON with 'data' as key 
     * where 'data' contanis the expected json 
     *
     * @return object $data json
     */
    public function getSalesAdviserInfo() {

        $salesAdvisers = Asesor::with('clientes')->get();

        $arrayData = [];

        foreach ($salesAdvisers as $salesAdviser) {
            $clientes = [];
            foreach ($salesAdviser->clientes as $cliente) {
                $detalle_pedidos=[];
                foreach ($cliente->pedidos as $pedido) {
                    
                    $productosArr=[];
                    
                    $productos = PedidoProducto::where('id_pedido', '=', $pedido->id_pedido)
                        ->with('producto')->get();

                    foreach ($productos as $producto) {
                        $productosArr[]=[
                            "id_producto" => $producto->producto->id_producto,
                            "tipo" => $producto->producto->tipo,
                            "cantidad" => $producto->producto->cantidad,
                            "valor_unitario" => $producto->producto->valor_unitario,
                            "total" => $producto->producto->total,    
                        ];
                    }

                    $detalle_pedidos[]=[
                        "id_pedido" => $pedido->id_pedido,
                        "total_productos" => $pedido->total_productos,
                        "total_pedido" => $pedido->total_pedido,
                        "estado" => $pedido->estado,
                        "fecha_pago" => $pedido->fecha_pago,
                        "productos" => $productosArr,
                    ];
                }
                $clientes[] = [
                    "id_cliente" => $cliente->id_cliente,
                    "total_pedidos" => $cliente->total_pedidos,
                    "name" => $cliente->name,
                    "detalle_pedidos" => $detalle_pedidos,
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

        $data = ['data' => $arrayData];

        return response()->json($data);
    }
}
