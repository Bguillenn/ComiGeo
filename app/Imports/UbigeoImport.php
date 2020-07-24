<?php

namespace App\Imports;
use App\Departamento;
use App\Provincia;
use App\Distrito;
use App\Comisaria;

use App\Ubigeo;
use Maatwebsite\Excel\Concerns\ToModel;

class UbigeoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row[3] == '00'){
            if($row[2] == '00'){
                return new Departamento([
                    'DepCod' => $row[1],
                    'DepNom' => strtoupper($this->eliminar_acentos($row[4])),
                ]);
            }
            else{
                return new Provincia([
                    'ProCod' => $row[1].$row[2],
                    'ProNom' => strtoupper($this->eliminar_acentos($row[4])),
                    'DepCod' => $row[1],
                ]);
            }
        }
        else if($row[3] != 'COD. DISTRITO'){
            return new Distrito([
                'DisCod' => $row[1].$row[2].$row[3],
                'DisNom' => strtoupper($this->eliminar_acentos($row[4])),
                'ProCod' => $row[1].$row[2],
                'DepCod' => $row[1],
            ]);
        }
        
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
        array('Ñ', 'C', 'c', '_'),
        $cadena
        );
        
        return $cadena;
    }
}
