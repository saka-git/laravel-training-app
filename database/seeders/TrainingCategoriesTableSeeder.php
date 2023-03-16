<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TrainingCategory;

class TrainingCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $training_category_names = [
            '胸', '肩', '背中','腕','腹','脚','その他',
        ];

        foreach($training_category_names as $training_category_name) {
            TrainingCategory::create([
                'name' => $training_category_name
            ]);
        }

    }
}