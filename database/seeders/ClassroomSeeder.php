<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\Classroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $number = 1;
        while ($number <=9){
            Classroom::query()->create(['name' => '10'.$number, 'building_id' => Building::all()->random()->id]);
            Classroom::query()->create(['name' => '20'.$number, 'building_id' => Building::all()->random()->id]);
            Classroom::query()->create(['name' => '30'.$number, 'building_id' => Building::all()->random()->id]);
            $number++;
        }
    }
}
