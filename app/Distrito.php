<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model{
	protected $table="distritos";
	protected $primaryKey="DisCod";
	protected $fillable=array('DisCod', 'DisNom','ProCod','DepCod');

	public function departamentos(){
		$this->belongsTo('Departamento');
	}

	public function provincias(){
		$this->belongsTo('Provincia');
	}

	public function comisarias(){
		$this->hasMany('Comisaria');
	}
}