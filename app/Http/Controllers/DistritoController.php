<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Distrito;

class DistritoController extends Controller
{
    //
    public function index($id)
    {
    	if(strlen($id)==3)
    	{
    		$id='0'.$id;
    	}
    	
    	$distritos=Distrito::where('ProCod','=',$id)->get();
		$result = [];
		if(!count($distritos))
		{
			return response()->json(['mensaje'=>'No se encuentra la provincia o no tiene distritos','codigo'=>404],404);
		}
		foreach ($distritos as $distrito) 
		{
			if(strlen($distrito->DisCod) == '5')
			{
				$result['0'.$distrito->DisCod]=['DisCod'=>'0'.$distrito->DisCod,
												'DisNom'=>$distrito->DisNom,
												'DepCod'=>$distrito->DepCod,
												'ProCod'=>$distrito->ProCod];
			}
			else
			{
				$result[$distrito->DisCod]=['DisCod'=>$distrito->DisCod,
											'DisNom'=>$distrito->DisNom,
											'DepCod'=>$distrito->DepCod,
											'ProCod'=>$distrito->ProCod];
			}
		}
		return response()->json(['distritos'=>$result],200);
    }
}
