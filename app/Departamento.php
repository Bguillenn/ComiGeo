<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model{
	protected $table="departamentos";
	protected $primaryKey="DepCod";
	protected $fillable=array('DepCod', 'DepNom');

	public function provincias(){
		$this->hasMany('Provincia');
	}

	public function distritos(){
		$this->hasMany('Distrito');
	}

	public function comisarias(){
		$this->hasMany('Comisaria');
	}
}