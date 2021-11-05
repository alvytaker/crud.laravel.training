<?php

namespace Database\Seeders;
use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::create(['name' => 'Arica y Parinacota']);
        Region::create(['name' => 'Tarapacá']);
        Region::create(['name' => 'Antofagasta']);
        Region::create(['name' => 'Atacama']);
        Region::create(['name' => 'Coquimbo']);
        Region::create(['name' => 'Valparaiso']);
        Region::create(['name' => 'Metropolitana de Santiago']);
        Region::create(['name' => 'Libertador General Bernardo O\'Higgins']);
        Region::create(['name' => 'Maule']);
        Region::create(['name' => 'Ñuble']);
        Region::create(['name' => 'Biobío']);
        Region::create(['name' => 'La Araucanía']);
        Region::create(['name' => 'Los Ríos']);
        Region::create(['name' => 'Los Lagos']);
        Region::create(['name' => 'Aysén del General Carlos Ibáñez del Campo']);
        Region::create(['name' => 'Magallanes y de la Antártica Chilena']);
    }
}
