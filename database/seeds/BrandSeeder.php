<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            [
                'name' => 'Vouchain - Safety Evoucher Solution',
                'address' => 'ĐHCNTT Khu Phố 6, Phường Linh Trung, Quận Thủ Đức, TPHCM',
                'phone' => '0873432123',
                'email' => 'contact@vouchain.com',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Highland Coffee',
                'address' => 'Số 12 đường Lý Thường Kiệt, Quận 10, TPHCM',
                'phone' => '0873432123',
                'email' => 'contact@highlandcoffee.com',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        DB::table('brand')->insert($brands);
    }
}
