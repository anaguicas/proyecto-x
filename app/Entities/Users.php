<?php
namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\SoftDelete;

/**
*Clase Modelo de Eloquent para la entidad Usuarios
*/

class Users extends Model{

	protected $table ='users';
	
	public function performers(){
		return $this->hasMany('App\Entities\Performers','id_user_performer','id');
	}	

	public function Subscriber(){
		return $this->hasMany('App\Entities\Performers','id_user','id');	
	}

	public function Studio(){
		return $this->hasMany('App\Entities\Performers','id_user_studio','id');	
	}

	public function Admin(){
		return $this->hasMany('App\Entities\Admin', 'id_user_admin','id');
	}
}
