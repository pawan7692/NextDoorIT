<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
	use Notifiable, HasFactory, HasRoles;

	protected $table = 'admins';
	protected $guard = 'admin';
	
	protected $fillable = [
		'name', 'email', 'password',
	];
	
	protected $hidden = [
		'password',
	];
}
