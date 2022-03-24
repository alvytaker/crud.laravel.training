<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'user';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'rut',
		'name',
		'email',
		'email_verified_at',
		'password',
		'remember_token',
		'profession_id',
        'comuna_id'
	];
	
	protected $casts =[
        'is_admin' => 'boolean',
		'profession_id' => 'int',
        
     ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];



 //Metodo ejemplo creado
public function isAdmin(){
    return $this->email === 'antonio@gmail.com';
}

//Metodo para filtrar un usuario mediante su email
public static function findByEmail($email){
    return static::where(compact('email'))->first();

}
//Conectar tablas
public function profession(){
return $this->belongsTo(Profession::class, 'profession_id');
}

//Conectar tablas
public function comuna(){
    return $this->belongsTo(Comuna::class,'comuna_id');
    }
}
