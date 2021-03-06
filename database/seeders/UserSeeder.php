<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profession;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        


        //Creacion de usuario mediante eloquent
        User::create([
            'name' => 'Duilio Palacios',
            'rut' => '12345678',
            'email' => 'duilio@styde.net',
            'password' => bcrypt('laravel'),
            'profession_id' => 1,
            'is_admin' => true,
            'comuna_id' => 6,
        ]); 

        //Creacion de usuario mediante constructor sql laravel
        DB::table('user')->insert([
            'name' => 'Esteban Mendez',
            'rut' => '12453876',
            'email' => 'Esteban@styde.net',
            'password' => bcrypt('laravel'),
            'profession_id' => 1,
            'is_admin' => true,
            'comuna_id' => 7,
        ]);


        //Creacion de usuario mediante QUERYPDO
        DB::insert("INSERT INTO user 
        (name, rut, email, password, profession_id, is_admin,comuna_id) 
         VALUES (?, ?, ?, ?, ?, ?, ?)",
         ['Camilo Perez','20345876','Camilo@styde.net',bcrypt('laravel'), 3, true, 8]);

         
        
    

    }
}
