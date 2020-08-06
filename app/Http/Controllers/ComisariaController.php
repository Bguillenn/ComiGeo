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
		return "Mostrar todas las comisarias";
	}

	public function cercano($lat, $lon)
	{
		return "Mostrando la comisaria más cercana a la posición $lat,$lon";
	}

	public function show($id)
	{
		return "Mostrando los datos de la comisaría $id";
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
	
}

 ?>