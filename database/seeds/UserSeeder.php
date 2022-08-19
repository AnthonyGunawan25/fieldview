<?php

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
        Illuminate\Support\Facades\DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$8l965/jHJLjggm5DNEMSlOmZTULb/jPKyuGauP8u4bZ6EY6QT36te',
                'address' => 'jln. dwiwarna 3',
                'phone' => '081289832642',
                'role' => 'admin',
            ]
        ]);
    }
}
