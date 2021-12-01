<?php

namespace Database\Seeders;

use App\Models\Imc;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Imc::create([
               'nombreImc' => 'Bajo peso',
               'imcMin' => 0,
               'imcMax' => 18
            ]);

            Imc::create([
                'nombreImc' => 'Normal',
                'imcMin' => 19,
                'imcMax' => 25
             ]);

             Imc::create([
                'nombreImc' => 'Sobrepeso',
                'imcMin' => 26,
                'imcMax' => 30
             ]);
             Imc::create([
                'nombreImc' => 'Obeso',
                'imcMin' => 30,
                'imcMax' => 1000
             ]);
    }
}
