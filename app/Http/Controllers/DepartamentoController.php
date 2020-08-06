<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    //

    public function index()
    {
    	return "Mostrando todos los departamentos";
    }

    public function show($id)
    {
    	return "Mostrando el departamento con id: $id";
    }
}
