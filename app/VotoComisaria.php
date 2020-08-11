<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class VotoComisaria extends Model{
	protected $table="voto_comisarias";
	protected $primaryKey="ip";
	protected $fillable=array('ip','ComCod','VotPun');

	public function comisarias(){
		$this->belongsTo('Comisaria');
	}
}