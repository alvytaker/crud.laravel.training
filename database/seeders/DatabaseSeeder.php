<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'profession',
            'user',
            'regiones',
            'comunas',
            'skills'
            ]);
        // \App\Models\User::factory(10)->create();

        $this->call(RegionSeeder::class);
        $this->call(ComunaSeeder::class);
        $this->call(ProfessionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SkillSeeder::class);

    }


    public function truncateTables(array $tables){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
    
        foreach($tables as $table){
        DB::table($table)->truncate(); //Vacia todas las tablas
        }
    
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); //Desactiva la union de las llaves foraneas
        
    }
}
