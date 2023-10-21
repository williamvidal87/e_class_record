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
            [ 
            'name' => 'Admin2',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('admin123'),
            'rule_id' => 1,
            ],
            [ 
            'name' => 'Instructor2',
            'email' => 'instructor2@gmail.com',
            'password' => bcrypt('instructor123'),
            'rule_id' => 2,
            ],
            [ 
            'name' => 'Student2',
            'email' => 'student2@gmail.com',
            'password' => bcrypt('student123'),
            'rule_id' => 3,
            ],
            [ 
            'name' => 'Admin3',
            'email' => 'admin3@gmail.com',
            'password' => bcrypt('admin123'),
            'rule_id' => 1,
            ],
            [ 
            'name' => 'Instructor3',
            'email' => 'instructor3@gmail.com',
            'password' => bcrypt('instructor123'),
            'rule_id' => 2,
            ],
            [ 
            'name' => 'Student3',
            'email' => 'student3@gmail.com',
            'password' => bcrypt('student123'),
            'rule_id' => 3,
            ],
            [ 
            'name' => 'Admin4',
            'email' => 'admin4@gmail.com',
            'password' => bcrypt('admin123'),
            'rule_id' => 1,
            ],
            [ 
            'name' => 'Instructor4',
            'email' => 'instructor4@gmail.com',
            'password' => bcrypt('instructor123'),
            'rule_id' => 2,
            ],
            [ 
            'name' => 'Student4',
            'email' => 'student4@gmail.com',
            'password' => bcrypt('student123'),
            'rule_id' => 3,
            ],
            [ 
            'name' => 'Admin5',
            'email' => 'admin5@gmail.com',
            'password' => bcrypt('admin123'),
            'rule_id' => 1,
            ],
            [ 
            'name' => 'Instructor5',
            'email' => 'instructor5@gmail.com',
            'password' => bcrypt('instructor123'),
            'rule_id' => 2,
            ],
            [ 
            'name' => 'Student5',
            'email' => 'student5@gmail.com',
            'password' => bcrypt('student123'),
            'rule_id' => 3,
            ],
            [ 
            'name' => 'Admin6',
            'email' => 'admin6@gmail.com',
            'password' => bcrypt('admin123'),
            'rule_id' => 1,
            ],
            [ 
            'name' => 'Instructor6',
            'email' => 'instructor6@gmail.com',
            'password' => bcrypt('instructor123'),
            'rule_id' => 2,
            ],
            [ 
            'name' => 'Student6',
            'email' => 'student6@gmail.com',
            'password' => bcrypt('student123'),
            'rule_id' => 3,
            ],
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
            [ 
            'name' => 'Admin2',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('admin123'),
            'rule_id' => 1,
            ],
            [ 
            'name' => 'Instructor2',
            'email' => 'instructor2@gmail.com',
            'password' => bcrypt('instructor123'),
            'rule_id' => 2,
            ],
            [ 
            'name' => 'Student2',
            'email' => 'student2@gmail.com',
            'password' => bcrypt('student123'),
            'rule_id' => 3,
            ],
            [ 
            'name' => 'Admin3',
            'email' => 'admin3@gmail.com',
            'password' => bcrypt('admin123'),
            'rule_id' => 1,
            ],
            [ 
            'name' => 'Instructor3',
            'email' => 'instructor3@gmail.com',
            'password' => bcrypt('instructor123'),
            'rule_id' => 2,
            ],
            [ 
            'name' => 'Student3',
            'email' => 'student3@gmail.com',
            'password' => bcrypt('student123'),
            'rule_id' => 3,
            ],
            [ 
            'name' => 'Admin4',
            'email' => 'admin4@gmail.com',
            'password' => bcrypt('admin123'),
            'rule_id' => 1,
            ],
            [ 
            'name' => 'Instructor4',
            'email' => 'instructor4@gmail.com',
            'password' => bcrypt('instructor123'),
            'rule_id' => 2,
            ],
            [ 
            'name' => 'Student4',
            'email' => 'student4@gmail.com',
            'password' => bcrypt('student123'),
            'rule_id' => 3,
            ],
            [ 
            'name' => 'Admin5',
            'email' => 'admin5@gmail.com',
            'password' => bcrypt('admin123'),
            'rule_id' => 1,
            ],
            [ 
            'name' => 'Instructor5',
            'email' => 'instructor5@gmail.com',
            'password' => bcrypt('instructor123'),
            'rule_id' => 2,
            ],
            [ 
            'name' => 'Student5',
            'email' => 'student5@gmail.com',
            'password' => bcrypt('student123'),
            'rule_id' => 3,
            ],
            [ 
            'name' => 'Admin6',
            'email' => 'admin6@gmail.com',
            'password' => bcrypt('admin123'),
            'rule_id' => 1,
            ],
            [ 
            'name' => 'Instructor6',
            'email' => 'instructor6@gmail.com',
            'password' => bcrypt('instructor123'),
            'rule_id' => 2,
            ],
            [ 
            'name' => 'Student6',
            'email' => 'student6@gmail.com',
            'password' => bcrypt('student123'),
            'rule_id' => 3,
            ],
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
            [ 
            'name' => 'Admin2',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('admin123'),
            'rule_id' => 1,
            ],
            [ 
            'name' => 'Instructor2',
            'email' => 'instructor2@gmail.com',
            'password' => bcrypt('instructor123'),
            'rule_id' => 2,
            ],
            [ 
            'name' => 'Student2',
            'email' => 'student2@gmail.com',
            'password' => bcrypt('student123'),
            'rule_id' => 3,
            ],
            [ 
            'name' => 'Admin3',
            'email' => 'admin3@gmail.com',
            'password' => bcrypt('admin123'),
            'rule_id' => 1,
            ],
            [ 
            'name' => 'Instructor3',
            'email' => 'instructor3@gmail.com',
            'password' => bcrypt('instructor123'),
            'rule_id' => 2,
            ],
            [ 
            'name' => 'Student3',
            'email' => 'student3@gmail.com',
            'password' => bcrypt('student123'),
            'rule_id' => 3,
            ],
            [ 
            'name' => 'Admin4',
            'email' => 'admin4@gmail.com',
            'password' => bcrypt('admin123'),
            'rule_id' => 1,
            ],
            [ 
            'name' => 'Instructor4',
            'email' => 'instructor4@gmail.com',
            'password' => bcrypt('instructor123'),
            'rule_id' => 2,
            ],
            [ 
            'name' => 'Student4',
            'email' => 'student4@gmail.com',
            'password' => bcrypt('student123'),
            'rule_id' => 3,
            ],
            [ 
            'name' => 'Admin5',
            'email' => 'admin5@gmail.com',
            'password' => bcrypt('admin123'),
            'rule_id' => 1,
            ],
            [ 
            'name' => 'Instructor5',
            'email' => 'instructor5@gmail.com',
            'password' => bcrypt('instructor123'),
            'rule_id' => 2,
            ],
            [ 
            'name' => 'Student5',
            'email' => 'student5@gmail.com',
            'password' => bcrypt('student123'),
            'rule_id' => 3,
            ],
            [ 
            'name' => 'Admin6',
            'email' => 'admin6@gmail.com',
            'password' => bcrypt('admin123'),
            'rule_id' => 1,
            ],
            [ 
            'name' => 'Instructor6',
            'email' => 'instructor6@gmail.com',
            'password' => bcrypt('instructor123'),
            'rule_id' => 2,
            ],
            [ 
            'name' => 'Student6',
            'email' => 'student6@gmail.com',
            'password' => bcrypt('student123'),
            'rule_id' => 3,
            ],
        ];

        User::insert($rule);
    }
}
