<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TrainingMenu;

class TrainingMenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chest_categories = [
            'ベンチプレス', 'チェストプレス', 'ダンベルフライ', 'ダンベルプレス'
        ];

        $shoulder_categories = [
            'サイドレイズ', 'ショルダープレス'
        ];

        $back_categories = [
            'ラットプルダウン', 'ワンハンドローイング', 'デッドリフト'
        ];

        $leg_categories = [
            'スクワット', 'レッグプレス'
        ];

        $arm_categories = [
            'アームカール'
        ];

        $abs_categories = [
            '腹筋'
        ];

        foreach ($chest_categories as $chest_category) {
            TrainingMenu::create([
                'name' => $chest_category,
                'training_category_id' => '1',
            ]);
        }

        foreach ($shoulder_categories as $shoulder_category) {
            TrainingMenu::create([
                'name' => $shoulder_category,
                'training_category_id' => '2',
            ]);
        }
        foreach ($back_categories as $back_category) {
            TrainingMenu::create([
                'name' => $back_category,
                'training_category_id' => '3',
            ]);
        }
        foreach ($leg_categories as $leg_category) {
            TrainingMenu::create([
                'name' => $leg_category,
                'training_category_id' => '4',
            ]);
        }
        foreach ($arm_categories as $arm_category) {
            TrainingMenu::create([
                'name' => $arm_category,
                'training_category_id' => '5',
            ]);
        }
        foreach ($abs_categories as $abs_category) {
            TrainingMenu::create([
                'name' => $abs_category,
                'training_category_id' => '6',
            ]);
        }
    }
}