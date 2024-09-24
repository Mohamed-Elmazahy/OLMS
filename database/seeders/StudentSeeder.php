<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = [
            [
                'name' => 'Hend',
                'email' => 'hend@std.com',
                'password' => Hash::make('password'),
                'role' => 'student',
            ],
            [
                'name' => 'Sara',
                'email' => 'sara@std.com',
                'password' => Hash::make('password'),
                'role' => 'student',
            ],
            [
                'name' => 'Hesham',
                'email' => 'hesham@std.com',
                'password' => Hash::make('password'),
                'role' => 'student',
            ],
            [
                'name' => 'Ali',
                'email' => 'ali@std.com',
                'password' => Hash::make('password'),
                'role' => 'student',
            ],
            [
                'name' => 'Samy',
                'email' => 'samy@std.com',
                'password' => Hash::make('password'),
                'role' => 'student',
            ],
            [
                'name' => 'Nada',
                'email' => 'nada@std.com',
                'password' => Hash::make('password'),
                'role' => 'student',
            ],
        ];

        foreach ($students as $student) {
            User::create($student);
        }
    }
}