<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $semester = [
            [
            'subject' => 'COMP 100',
            'description' => 'Computer Fundamentals',
            ],
            [
            'subject' => 'COMP 301',
            'description' => 'Computer Programming for Mobile Applications',
            ],
        ];

        Subject::insert($semester);
    }
}
