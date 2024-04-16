<?php

namespace Database\Seeders;

use App\Models\Rule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rule = [
            [ 
            'rule_name' => 'Admin',
            ],
            [ 
            'rule_name' => 'Instructor'
            ],
            [ 
            'rule_name' => 'Student'
            ],
        ];

        Rule::insert($rule);
    }
}
