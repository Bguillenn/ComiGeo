<?php

namespace App\Http\Controllers;

use App\Comisaria;
use App\VotoComisaria;
//use Request;
use Illuminate\Http\Request;

class VotoComisariaController extends Controller
{
    public function votar($voto, $id, Request $request)
	{
		$comisaria=Comisaria::find($id);
		if(!$comisaria)
		{
			return response()->json(['response'=>['realizado'=>false, 'mensaje'=>'No se encuentra la comisaria']],404);
		}
		if($voto<1 || $voto>5)
		{
			return response()->json(['response'=>['realizado'=>false, 'mensaje'=>'Voto fuera del rango de valores (1-5)']],400);
		}

		//$request=new Request;
		$ip=$request->ip();

		$votante=VotoComisaria::find($ip);
		if(!$votante)
		{
			$votoComi = new VotoComisaria;
			$votoComi->ip = $ip;
			$votoComi->ComCod = $id;
			$votoComi->VotPun = $voto;
			$votoComi->save();
		}
		else
		{
			$votante->ComCod = $id;
			$votante->VotPun = $voto;
			$votante->save();
		}
		return response()->json(['response'=>['realizado'=>true, 'mensaje'=>'']],202);
	}
}
