<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            [
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'first_name' => 'Bùi',
                'last_name' => 'Tín',
                'is_admin' => true,
                'is_brand_owner' => false,
                'brand_id' => 1,
                'email' => 'admin@evoucher.com',
                'avt_url' => '',
                'is_activated' => true,
                'lang_key' => 'vi_VN',
                'activation_key' => '',
                'reset_key' => '',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        DB::table('user')->insert($admin);
        factory(User::class, 10)->create();
    }
}
