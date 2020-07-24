<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model{
	protected $table="provincias";
	protected $primaryKey="ProCod";
	protected $fillable=array('ProCod', 'ProNom', 'DepCod');

	public function departamentos(){
		$this->belongsTo('Departamento');
	}

	public function distritos(){
		$this->hasMany('Distrito');
	}

	public function comisarias(){
		$this->hasMany('Comisaria');
	}
}