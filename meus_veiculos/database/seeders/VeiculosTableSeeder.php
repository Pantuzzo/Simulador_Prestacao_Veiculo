<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Veiculos;

class VeiculosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Veiculos::truncate();

        $faker = \Faker\Factory::create();

        $descriptions = ['Onix', 'HB20', 'Gol', 'Mobi', 'Onix Plus', 'C3 Attraction', 'Ford Ka SE Plus', 'Toyota Etios Hatch X Plus'];
        $valores = ['81880.00', '73390.00', '74150.00', '63967.00', '81880.00', '70690.00', '39290.00', '72940.00'];
        for ($i = 0; $i < count($descriptions); $i++) {
            Veiculos::create([
                'description' => $descriptions[$i],
                'value' => $valores[$i],
            ]);
        }
    }
}
