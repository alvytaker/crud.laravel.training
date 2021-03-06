<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $fillable = ['title'];

    protected $table = 'profession';

    public $timestamps = false;

    //Conectar tablas
    public function user(){
        return $this->hasMany(User::class,'profession_id');
    }
}
