<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\SoftDelete;
use Illuminate\Foundation\Auth\User;

class Perfil_performer extends Model{
	protected $table ='Photo_performer';

	public function Performers(){
		return $this->belonsTo('App\Entities\Performers','id_performer_FK','id');
	}
}