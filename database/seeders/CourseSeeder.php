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
            'abbreviation' => 'BS Bio',
            'description' => 'Bachelor of Science in Biology'
            ],
            [ 
            'abbreviation' => 'BS Chem',
            'description' => 'Bachelor of Science in Chemistry'
            ],
            [ 
            'abbreviation' => 'BSCS',
            'description' => 'Bachelor of Science in Computer Science'
            ],
            [ 
            'abbreviation' => 'BS Geology',
            'description' => 'Bachelor of Science in Geology'
            ],
            [ 
            'abbreviation' => 'BSIT',
            'description' => 'Bachelor of Science in Information Technology'
            ],
            [ 
            'abbreviation' => 'BS Mathematics',
            'description' => 'Bachelor of Science in Mathematics'
            ],
            [ 
            'abbreviation' => 'BS Political Science',
            'description' => 'Bachelor of Science in Psychology'
            ],
            [ 
            'abbreviation' => 'BSAT',
            'description' => 'Bachelor of Science in Automotive Technology'
            ],
            [ 
            'abbreviation' => 'BSAMT',
            'description' => 'Bachelor of Science in Aviation Maintenance'
            ],
            [ 
            'abbreviation' => 'BSC',
            'description' => 'Bachelor of Science in Civil Technology'
            ],
            [ 
            'abbreviation' => 'BSECT',
            'description' => 'Bachelor of Science in Computer and Electronics Technology'
            ],
            [ 
            'abbreviation' => 'BSET',
            'description' => 'Bachelor of Science in Electrical Technology'
            ],
            [ 
            'abbreviation' => 'BSFT',
            'description' => 'Bachelor of Science in Food Technology'
            ],
            [ 
            'abbreviation' => 'BSIT',
            'description' => 'Bachelor of Science in Industrial Technology'
            ],
            [ 
            'abbreviation' => 'BSME',
            'description' => 'Bachelor of Science in Mechanical Technology'
            ],
            [ 
            'abbreviation' => 'BSEEd',
            'description' => 'Bachelor of Science in Elementary Education'
            ],
            [ 
            'abbreviation' => 'BSEd',
            'description' => 'Bachelor of Science in Secondary Education'
            ],
        ];

        Course::insert($course);
    }
}
