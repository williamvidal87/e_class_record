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
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'rule_id' => 1,
            ],
            [ 
            'name' => 'Instructor',
            'email' => 'instructor@gmail.com',
            'password' => bcrypt('instructor123'),
            'rule_id' => 2,
            ],
            [ 
            'name' => 'Student',
            'email' => 'student@gmail.com',
            'password' => bcrypt('student123'),
            'rule_id' => 3,
            ],
        ];

        User::insert($rule);
    }
}
