<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DistritoController extends Controller
{
    //
    public function index($id)
    {
    	return "Mostrando los distritos de la provincia con id: $id";
    }
}
