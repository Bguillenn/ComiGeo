<?php namespace App\Http\Controllers;
use App\Departamento;
use App\Provincia;
use App\Distrito;
use App\Comisaria;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UbigeoImport;
use Illuminate\Http\Request;

class UbigeoController extends Controller{

	function index(){
		$modelo = new Departamento();
		
	}

	public function importExcel(Request $request){
		Distrito::get()->each->delete();
		Provincia::get()->each->delete();
		Departamento::get()->each->delete();
		$file = $request->file('file');
		Excel::import(new UbigeoImport, $file);
		return back()->with('message', 'Importacion de ubigeo completada');
	}
	
}




 ?>