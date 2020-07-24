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

	function index(){
		$modelo = new Comisaria();
		
	}

	public function importExcel(Request $request){
		Comisaria::get()->each->delete();
		$file = $request->file('file');
		Excel::import(new ComisariaImport, $file);

		return back()->with('message', 'Importacion de comisarias completada');
	}
	
}

 ?>