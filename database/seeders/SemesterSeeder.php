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
            'description' => 'First Semester',
            ],
            [
            'description' => 'Second Semester'
            ],
        ];

        Semester::insert($semester);
    }
}
