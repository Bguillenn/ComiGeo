<?php namespace App\Http\Controllers;
use App\Departamento;
use App\Provincia;
use App\Distrito;
use App\Comisaria;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ComisariaImport;
use Illuminate\Http\Request;

class ComisariaController extends Controller{

	public function index()
	{
		$comisarias=Comisaria::all();
		$result = [];
		foreach ($comisarias as $comisaria) 
		{
			$codigo=$comisaria->ComCod;
			$datos=$this->datos($comisaria);
			$result[$codigo]=$datos;
		}
		return response()->json(['comisarias'=>$result],200);
	}

	public function cercano($lat, $lon)
	{
		$rango = 2.2;
		$comisarias=Comisaria::all();
		$dist = 2500;
		$id = 1;
		foreach ($comisarias as $comisaria) {
			if(abs($lat-$comisaria->ComLat)<$rango && abs($lon-$comisaria->ComLon)<$rango)
			{
				$tmp = $this->distanceCalculation($lat,$lon,$comisaria);
				if($tmp<$dist)
				{
					$dist = $tmp;
					$id = $comisaria->ComCod;
				}
			}
		}
		$result = $this->datos(Comisaria::find($id));
		return response()->json([$result],200);

	}

	public function show($id)
	{
		$comisaria=Comisaria::find($id);
		if(!$comisaria)
		{
			return response()->json(['mensaje'=>'No se encuentra la comisaria','codigo'=>404],404);
		}
		$result = $this->datos($comisaria);

		return response()->json([$result],200);
	}

	public function distancia($id, $lat, $lon)
	{
		$comisaria = Comisaria::find($id);
		if(!$comisaria)
		{
			return response()->json(['mensaje'=>'No se encuentra la comisaria','codigo'=>404],404);
		}
		$dist = round($this->distanceCalculation($lat,$lon,$comisaria), 3);
		return response()->json(['distancia'=>['kms'=>$dist]],200);
	}

	public function buscar($query)
	{
		$query = strtoupper($this->eliminar_acentos($query));
		$comisarias=Comisaria::all();
		$result = [];
		foreach ($comisarias as $comisaria) 
		{
			if($this->contieneQuery($comisaria,$query))
			{
				$codigo=$comisaria->ComCod;
				$datos=$this->datos($comisaria);
				
				$result[$codigo]=$datos;
			}
		}
		if(!count($result))
		{
			return response()->json(['mensaje'=>'No se encuentra coincidencias.','codigo'=>404],404);
		}
		return response()->json(['comisarias'=>$result],200);
	}

	public function importExcel(Request $request)
	{
		$file = $request->file('file');
		Excel::import(new ComisariaImport, $file);

		return back()->with('message', 'Importacion de comisarias completada');
	}

	function datos($comisaria)
	{
		$departamento=Departamento::find($comisaria->ComDepCod);
		$provincia=Provincia::find($comisaria->ComProCod);
		$distrito=Distrito::find($comisaria->ComDisCod);
		
		$result = [	'ComId' => $comisaria->ComCod,
					'CodInei'=>$comisaria->ComCodInei,
					'DepNom'=>$departamento->DepNom,
					'ProNom'=>$provincia->ProNom,
					'DisNom'=>$distrito->DisNom,
					'ComLat'=>$comisaria->ComLat,
					'ComLgn'=>$comisaria->ComLon,
					'ComMacRegPol'=>$comisaria->ComMacRegPol,
					'ComDivPol'=>$comisaria->ComDivPol,
					'ComNom'=>$comisaria->ComNom
				];
		return $result;
	}

	function distanceCalculation($point1_lat, $point1_long, $comisaria) 
	{
		// Cálculo de la distancia en grados
		$point2_lat = $comisaria->ComLat;
		$point2_long = $comisaria->ComLon;
		$degrees = rad2deg(acos((sin(deg2rad($point1_lat))*sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat))*cos(deg2rad($point2_lat))*cos(deg2rad($point1_long-$point2_long)))));

		$distance = $degrees * 111.13384;

		return $distance;
	}

	function eliminar_acentos($cadena)
	{    
        //Reemplazamos la A y a
        $cadena = str_replace(
        array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
        array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
        $cadena
        );
 
        //Reemplazamos la E y e
        $cadena = str_replace(
        array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
        array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
        $cadena );
 
        //Reemplazamos la I y i
        $cadena = str_replace(
        array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
        array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
        $cadena );
 
        //Reemplazamos la O y o
        $cadena = str_replace(
        array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
        array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
        $cadena );
 
        //Reemplazamos la U y u
        $cadena = str_replace(
        array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
        array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
        $cadena );
 
        //Reemplazamos la N, n, C y c
        $cadena = str_replace(
        array('ñ', 'Ç', 'ç', '-'),
        array('Ñ', 'C', 'c','_'),
        $cadena
        );
        
        return $cadena;
    }
	
	function contieneQuery($comisaria,$query)
	{
		$nombre = $comisaria->ComNom;
		if(strpos($nombre, $query)!==false)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}

 ?>