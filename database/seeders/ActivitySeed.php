<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'activity_title' => 'Daftar di Coin News',
                'activity_description' => 'Selesaikan pendaftaran untuk mendapatkan 10 coin',
                'reward_point' => 10
            ],
            [
                'activity_title' => 'Ajak teman daftar Coin News',
                'activity_description' => 'Ajak temanmu untuk daftar di Coin News dan dapatkan 20 coin',
                'reward_point' => 20
            ],
            [
                'activity_title' => 'Tulis sebuah artikel',
                'activity_description' => 'Tulis artikel yang relevan untuk mendapatkan 10 coin',
                'reward_point' => 15
            ],
            [
                'activity_title' => 'Berkomentar pada artikel',
                'activity_description' => 'Memberikan komentar pada artikel akan mendapatkan 1 coin',
                'reward_point' => 1
            ],
            [
                'activity_title' => 'Lengkapi data diri',
                'activity_description' => 'Lengkapi data diri untuk mendapatkan 5 coin',
                'reward_point' => 5
            ],
        ];
        DB::table('activities')->insert($data);
    }
}
