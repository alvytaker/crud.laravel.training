<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profession;
use DB;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //Consulta con constructor de larabel
         DB::table('profession')->insert(['title'=>'Back-end developer']);
         //DB::table('professions')->insert(['title'=>'Front-end developer']);
 
         //Consulta manul sql pero con paramentros que evitan la injeccion sql
         DB::insert('INSERT INTO profession (title) VALUES (:title)', ['title' => 'Desarrollador Front-end']);
       
         //Inserto mediante Eloquent
         Profession::create([
         'title'=>'Full-Stack'
         ]);

        //Inserto mediante factory
        
    }
}
