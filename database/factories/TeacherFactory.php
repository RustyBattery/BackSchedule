<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $names = [
            'Михеев Ярослав Эминович',
            'Королев Вячеслав Валерьевич',
            'Авдеев Даниил Алексеевич',
            'Игнатова Есения Дмитриевна',
            'Наумова Маргарита Андреевна',
            'Алешин Илья Иванович',
            'Миронова Василиса Артёмовна',
            'Николаев Александр Александрович',
            'Федоров Денис Кириллович',
            'Румянцева Марьям Лукинична',
            'Маслова Амина Фёдоровна',
            'Куликов Матвей Ильич',
            'Левин Константин Ильич',
            'Соколов Евгений Дмитриевич',
            'Герасимов Дмитрий Иванович',
            'Смирнов Давид Никитич',
            'Хохлова Таисия Андреевна',
            'Семенов Глеб Максимович',
            'Греков Лев Дамирович',
            'Черкасова Виктория Никитична'
        ];

        return [
            'name' => fake()->unique()->randomElement($names),
            'phone' => '+7('.rand(100, 999).')'.rand(100, 999).'-'.rand(10, 99).'-'.rand(10, 99),
        ];
    }
}
