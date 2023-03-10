<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create(['name'=>'user', 'email'=>'user@gmail.com', 'is_admin'=>false, 'password'=>Hash::make('user')]);
        User::query()->create(['name'=>'admin', 'email'=>'admin@gmail.com', 'is_admin'=>true, 'password'=>Hash::make('admin')]);
    }
}
