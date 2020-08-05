<?php namespace App\Http\Controllers;
use App\Denuncia;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DenunciasImport;
use Illuminate\Http\Request;

class DenunciaController extends Controller{


	public function importExcel(Request $request){
		$file = $request->file('file');
		Excel::import(new DenunciasImport, $file);

		return back()->with('message', 'Importacion de denuncias completada');
	}
	
}

 ?>