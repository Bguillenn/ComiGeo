<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProvinciaController extends Controller
{
    //

    public function index($id)
    {
    	return "Mostrando las provincias del departamento con id: $id";
    }
}
