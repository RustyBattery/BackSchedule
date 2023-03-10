<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Classroom;
use App\Models\Timeslot;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BuildingSeeder::class,
            ClassroomSeeder::class,
            GroupSeeder::class,
            SubjectSeeder::class,
            TimeslotSeeder::class,
            TeacherSeeder::class,
            UserSeeder::class,
        ]);
    }
}
