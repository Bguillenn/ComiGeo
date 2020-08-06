<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comisaria extends Model{
	protected $table="comisarias";
	protected $primaryKey="ComCod";
	protected $fillable=array('ComCod', 'ComCodInei', 'ComDepCod', 'ComProCod', 'ComDisCod', 'ComLat', 'ComLon', 'ComMacRegPol', 'ComRegPol', 'ComDivPol', 'ComNom');

	protected $hidden=['created_at','updated_at'];

	public function departamentos(){
		$this->belongsTo('Departamento');
	}

	public function provincias(){
		$this->belongsTo('Provincia');
	}

	public function distritos(){
		$this->belongsTo('Distrito');
	}

	public function votosComisarias(){
		$this->hasMany('VotoComisaria');
	}
}