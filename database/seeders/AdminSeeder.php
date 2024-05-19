<?php

namespace Database\Seeders;

use App\Enum\UserEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '0123456789',
            'address' => 'Damanhour, Egypt',
            'avatar' => 'https://i.pravatar.cc',
            'school' => 'Faculty of Computers and Information',
            'birthday' => '1998-01-01',
            'role' => UserEnum::ADMIN->value,
            'gender' => UserEnum::MALE->value,
            'password' => '22334400',
        ]);
    }
}
