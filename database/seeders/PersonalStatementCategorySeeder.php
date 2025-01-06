<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PersonalStatementCategory;

class PersonalStatementCategorySeeder extends Seeder
{
    public function run()
    {
        // Add default categories
        PersonalStatementCategory::create(['name' => 'anso']);
        PersonalStatementCategory::create(['name' => 'csc']);
    }
}
