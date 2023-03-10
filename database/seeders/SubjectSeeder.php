<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
            'История',
            'Межкультурные коммуникации',
            'Основы программирования',
            'Философия',
            'Основы командной разработки',
            'Проектная деятельность',
            'Разработка и анализ требований',
            'Основы машинного обучения',
            'Иностранный язык',
            'Экономика',
            'Экология',
            'Генетика',
            'Предпринимательство',
            'История музыки'
        ];

        foreach ($subjects as $subject){
            Subject::query()->create(['name'=>$subject]);
        }
    }
}
