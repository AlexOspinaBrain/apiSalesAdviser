<?php

namespace App\Http\Controllers;

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


        $arrayData = [];

        $data = ['success' => true, 'data' => $arrayData];

        return response()->json($data);
    }
}
