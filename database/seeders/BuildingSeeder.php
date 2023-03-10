<?php

namespace Database\Seeders;

use App\Models\Building;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $number = 1;
        while ($number <=10){
            Building::query()->create(['name' => $number, 'address' => 'пр. Ленина, 36 ('.$number.')']);
            $number++;
        }
    }
}
