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

	public function voto($id, Request $request)
	{
		$comisaria=Comisaria::find($id);
		if(!$comisaria)
		{
			return response()->json(['response'=>['realizado'=>false, 'mensaje'=>'No se encuentra la comisaria']],404);
		}

		$ip=$request->ip();
		$puntaje = 0;
		$voto=VotoComisaria::find($ip);
		if(!$voto || $voto->ComCod != $id)
		{
			return response()->json(['response'=>['ip'=>$ip, 'puntaje'=>0]],200);
		}
		else
		{
			return response()->json(['response'=>['ip'=>$ip, 'puntaje'=>$voto->VotPun]],200);
		}
	}

	public function puntaje($id)
	{
		$comisaria=Comisaria::find($id);
		if(!$comisaria)
		{
			return response()->json(['response'=>['realizado'=>false, 'mensaje'=>'No se encuentra la comisaria']],404);
		}

		$array=VotoComisaria::where('ComCod','=',$id)->get();
		if(!count($array))
		{
			return response()->json(['mensaje'=>'Esta comisaria no ha recibido votos aun.'],200);
		}

		$sum = 0;
		$cont = 0;
		foreach ($array as $voto) 
		{
			$sum += $voto->VotPun;
			$cont++;
		}
		$prom = $sum/$cont;
		return response()->json(['response'=>['promedio'=>$prom]],200);
	}
}
