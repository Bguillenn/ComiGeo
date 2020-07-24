<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model{
	protected $table="denuncias";
	protected $primaryKey="DenCod";
	protected $fillable=array('DenGen', 'DenEda', 'DenMes');

}