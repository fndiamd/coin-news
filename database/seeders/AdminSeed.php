<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'admin_name' => 'Admin Coin News',
            'admin_email' => 'admin@coin-news.id',
            'admin_password' => bcrypt('password')
        ];
        DB::table('admins')->insert($data);
    }
}
