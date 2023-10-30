<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rule = [
            [ 
            'id_number' => '1234567',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone_number' => '9212969669',
            'password' => bcrypt('admin123'),
            'rule_id' => 1,
            'course_id' => null,
            ],
            [ 
            'id_number' => '12345678',
            'name' => 'Instructor',
            'email' => 'instructor@gmail.com',
            'phone_number' => '9212969669',
            'password' => bcrypt('instructor123'),
            'rule_id' => 2,
            'course_id' => null,
            ],
            [ 
            'id_number' => '12345679',
            'name' => 'Student',
            'email' => 'student@gmail.com',
            'phone_number' => '9212969669',
            'password' => bcrypt('student123'),
            'rule_id' => 3,
            'course_id' => 1,
            ]
        ];

        User::insert($rule);
    }
}
