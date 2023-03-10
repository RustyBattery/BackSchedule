<?php

namespace Database\Seeders;

use App\Models\Timeslot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimeslotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'];
        $start_times = ['08:45', '10:35', '12:25', '14:45', '16:35', '18:25', '20:15'];
        $end_times = ['10:20', '12:10', '14:00', '16:20', '18:10', '20:00', '21:50'];
        foreach ($days as $day){
            for ($i = 0; $i < count($start_times); $i++) {
                Timeslot::query()->create(['day'=>$day, 'start_time' => $start_times[$i], 'end_time' => $end_times[$i]]);
            }
        }
    }
}
