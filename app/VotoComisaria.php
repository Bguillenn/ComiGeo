<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class VotoComisaria extends Model{
	protected $table="votos_comisarias";
	protected $primaryKey="ip";
	protected $fillable=array('ComCod','VotPun');

	public function comisarias(){
		$this->belongsTo('Comisaria');
	}
}