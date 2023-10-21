<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $course = [
            [ 
            'course_name' => 'BSIT',
            ],
            [ 
            'course_name' => 'BSCS'
            ],
            [ 
            'course_name' => 'BSBA'
            ],
        ];

        Course::insert($course);
    }
}
