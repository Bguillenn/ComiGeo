<?php

namespace App\Http\Controllers;

use App\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    //

    public function index()
    {
    	$departamentos=Departamento::all();
		$result = [];
		foreach ($departamentos as $departamento) 
		{
			if(strlen($departamento->DepCod) == 1)
			{
				$result['0'.$departamento->DepCod]=['DepNom'=>$departamento->DepNom];
			}
			else
			{
				$result[$departamento->DepCod]=['DepNom'=>$departamento->DepNom];
			}
		}
		return response()->json(['departamentos'=>$result],200);
    }

    public function show($id)
    {
    	return "Mostrando el departamento con id: $id";
    }

}
