<?php

use Illuminate\Database\Seeder;

class CustomerClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'key' => 'standar',
                'value' => 'Standar',
                'min_score' => '0',
                'color' => '',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'bronze',
                'value' => 'Bronze',
                'min_score' => '100',
                'color' => '',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'silver',
                'value' => 'Silver',
                'min_score' => '500',
                'color' => '',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'gold',
                'value' => 'Gold',
                'min_score' => '2000',
                'color' => '',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'platinum',
                'value' => 'Platinum',
                'min_score' => '5000',
                'color' => '',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'key' => 'diamond',
                'value' => 'Diamond',
                'min_score' => '15000',
                'color' => '',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        DB::table('customer_classification')->insert($datas);
    }
}
