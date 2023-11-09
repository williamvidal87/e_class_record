<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $semester = [
            [ 
            'description' => 'FIRST SEMESTER',
            ],
            [ 
            'description' => 'SECOND SEMESTER'
            ],
        ];

        Semester::insert($semester);
    }
}
