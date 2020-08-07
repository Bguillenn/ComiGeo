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
		return "Mostrando la comisaria más cercana a la posición $lat,$lon";
	}

	public function show($id)
	{
		$comisaria=Comisaria::find($id);
		if(!$comisaria)
		{
			return response()->json(['mensaje'=>'No se encuentra la comisaría','codigo'=>404],404);
		}
		$result = $this->datos($comisaria);

		return response()->json([$id=>$result],200);
	}

	public function distancia($id, $lat, $lon)
	{
		return "Mostrando la distancia de $lat,$lon hasta $id";
	}

	public function buscar($query)
	{
		return "Mostrando las comisarías que cumplen con la búsqueda $query";
	}

	public function importExcel(Request $request){
		Comisaria::get()->each->delete();
		$file = $request->file('file');
		Excel::import(new ComisariaImport, $file);

		return back()->with('message', 'Importacion de comisarias completada');
	}

	function datos($comisaria)
	{
		$departamento=Departamento::find($comisaria->ComDepCod);
		$provincia=Provincia::find($comisaria->ComProCod);
		$distrito=Distrito::find($comisaria->ComDisCod);
		
		$result = ['CodInei'=>$comisaria->ComCodInei,
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
	
}

 ?>