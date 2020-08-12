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

	public function googleLineChart()
	{
		$denuncias = DB::table('denuncias')
						->select(
							DB::raw("DenMes as mes"),
							DB::raw("AVG(CASE WHEN DenGen = 'F' THEN DenEda END) as genF"),
							DB::raw("AVG(CASE WHEN DenGen = 'M' THEN DenEda END) as genM"))
						->groupBy("DenMes")
						->orderBy("DenMes")
						->get();

		$result[] = ['Mes','Femenino','Masculino'];

		$result[1] = [$denuncias[2]->mes, (float)$denuncias[2]->genF, (float)$denuncias[2]->genM];
		$result[2] = [$denuncias[3]->mes, (float)$denuncias[3]->genF, (float)$denuncias[3]->genM];
		$result[3] = [$denuncias[6]->mes, (float)$denuncias[6]->genF, (float)$denuncias[6]->genM];
		$result[4] = [$denuncias[0]->mes, (float)$denuncias[0]->genF, (float)$denuncias[0]->genM];
		$result[5] = [$denuncias[7]->mes, (float)$denuncias[7]->genF, (float)$denuncias[7]->genM];
		$result[6] = [$denuncias[5]->mes, (float)$denuncias[5]->genF, (float)$denuncias[5]->genM];
		$result[7] = [$denuncias[4]->mes, (float)$denuncias[4]->genF, (float)$denuncias[4]->genM];
		$result[8] = [$denuncias[1]->mes, (float)$denuncias[1]->genF, (float)$denuncias[1]->genM];
		$result[9] = [$denuncias[10]->mes, (float)$denuncias[10]->genF, (float)$denuncias[10]->genM];
		$result[10] = [$denuncias[9]->mes, (float)$denuncias[9]->genF, (float)$denuncias[9]->genM];
		$result[11] = [$denuncias[8]->mes, (float)$denuncias[8]->genF, (float)$denuncias[8]->genM];

		$promF = (float)$denuncias[0]->genF +
					(float)$denuncias[1]->genF +
					(float)$denuncias[2]->genF +
					(float)$denuncias[3]->genF +
					(float)$denuncias[4]->genF +
					(float)$denuncias[5]->genF +
					(float)$denuncias[6]->genF +
					(float)$denuncias[7]->genF +
					(float)$denuncias[8]->genF +
					(float)$denuncias[9]->genF +
					(float)$denuncias[10]->genF;

		$promM = (float)$denuncias[0]->genM +
					(float)$denuncias[1]->genM +
					(float)$denuncias[2]->genM +
					(float)$denuncias[3]->genM +
					(float)$denuncias[4]->genM +
					(float)$denuncias[5]->genM +
					(float)$denuncias[6]->genM +
					(float)$denuncias[7]->genM +
					(float)$denuncias[8]->genM +
					(float)$denuncias[9]->genM +
					(float)$denuncias[10]->genM;

		$promF = $promF/11;
		$promM = $promM/11;

		$result[12] = ['DICIEMBRE', $promF, $promM];

		$datos = DB::table('denuncias')
						->select(
							DB::raw("COUNT(CASE WHEN DenGen = 'F' THEN DenEda END) as genF"),
							DB::raw("COUNT(CASE WHEN DenGen = 'M' THEN DenEda END) as genM"))
						->get();

		$contF = (int)$datos[0]->genF;
		$contM = (int)$datos[0]->genM;
		$total = $contF + $contM;
		$data[0] = $total;
		$data[1] = $contM;
		$data[2] = $contF;

		return view('welcome')
                ->with('basic',json_encode($result))
                ->with('data', json_encode($data));
	}
	
}

 ?>