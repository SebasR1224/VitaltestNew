<?php

namespace Database\Seeders;

use App\Models\ParteCuerpo;
use Illuminate\Database\Seeder;

class PartesCuerpoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $partesCuerpo = [
            'Cabeza',
            'Cuello',
            'Hombro',
            'Pecho',
            'Codo',
            'Barriga',
            'Brazo',
            'Muñeca',
            'Mano',
            'Dedo',
            'Muslo',
            'Pierna',
            'Rodilla',
            'Pantorrila',
            'Tobillo',
            'Talon',
            'Pie',
            'Uña'
       ];
       foreach ($partesCuerpo as $parte){
        ParteCuerpo::create([
           'nombreParte' => $parte
        ]);
    }
    }
}
