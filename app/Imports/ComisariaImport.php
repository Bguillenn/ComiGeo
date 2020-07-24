<?php

namespace App\Imports;

use App\Departamento;
use App\Provincia;
use App\Distrito;
use App\Comisaria;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class ComisariaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $comCod = $row[1];
        $comCodINEI = $row[0];
        $dep = $this->eliminar_acentos($row[2]);
        $pro = $this->eliminar_acentos($row[3]);
        $dis = $this->eliminar_acentos($row[4]);
        $coma = strpos($row[5], ',');
        $comLat = substr($row[5], 0, $coma);
        $comLon = substr($row[5], $coma + 1);
        $comMacRegPol = $row[6];
        $comRegPol = $row[7];
        $comDivPol = $row[8];
        $comNom = $row[9];
        $comDepCod = '0';
        $comProCod = '0';
        $comDisCod = '0';
        $regDep = Departamento::get()->where('DepNom',$dep)->first()['DepCod'];

        $tempPro = Provincia::get()->where('ProNom', $pro);
        $regPro = 0;
        foreach($tempPro as $iter){
            if($iter['DepCod'] == $regDep){
                $regPro = $iter['ProCod'];
            }
        }

        $tempDis = Distrito::get()->where('DisNom', $dis);
        $regDis = 0;
        foreach($tempDis as $iter){
            if($iter['DepCod'] == $regDep && $iter['ProCod'] == $regPro){
                $regDis = $iter['DisCod'];
            }
        }

        if($regDep > 9){
            $comDepCod = '';
        }
        if($regPro > 999){
            $comProCod = '';
        }
        if($regDis > 99999){
            $comDisCod = '';
        }
        $comDepCod = $comDepCod.$regDep;
        $comProCod = $comProCod.$regPro;
        $comDisCod = $comDisCod.$regDis;
        return new Comisaria([
            'ComCod' => $comCod,
            'ComCodInei' => $comCodINEI,
            'ComDepCod' => $comDepCod,
            'ComProCod' => $comProCod,
            'ComDisCod' => $comDisCod,
            'ComLat' => $comLat,
            'ComLon' => $comLon,
            'ComMacRegPol' => strtoupper($this->eliminar_acentos($comMacRegPol)),
            'ComRegPol' => strtoupper($this->eliminar_acentos($comRegPol)),
            'ComDivPol' =>strtoupper($this->eliminar_acentos( $comDivPol)),
            'ComNom' => strtoupper($this->eliminar_acentos($comNom)),
        ]);
        
    }

    function eliminar_acentos($cadena){
        
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
}
