<?php

namespace App\Http\Controllers;
use App\Provincia;
use Illuminate\Http\Request;

class ProvinciaController extends Controller
{
    //

    public function index($id)
    {
    	if(strlen($id)==1)
    	{
    		$id='0'.$id;
    	}
    	
    	$provincias=Provincia::where('DepCod','=',$id)->get();
		$result = [];
		if(!count($provincias))
		{
			return response()->json(['mensaje'=>'No se encuentra el departamento o no tiene provincias','codigo'=>404],404);
		}
		foreach ($provincias as $provincia) 
		{
			if(strlen($provincia->ProCod) == '3')
			{
				array_push($result,['ProCod' => '0'.$provincia->ProCod,
												'ProNom'=>$provincia->ProNom,
												'DepCod'=>$provincia->DepCod]);
			}
			else
			{
				array_push($result,[	'ProCod' => $provincia->ProCod,
												'ProNom'=>$provincia->ProNom,
												'DepCod'=>$provincia->DepCod]);
			}
		}
		return response()->json(['provincias'=>$result],200);
    }
}
