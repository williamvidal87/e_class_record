<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            OtherUserSeeder::class,
            SubjectSeeder::class,
            SemesterSeeder::class,
            CourseSeeder::class,
            RuleSeeder::class,
            UserSeeder::class,
        ]);
    }
}
