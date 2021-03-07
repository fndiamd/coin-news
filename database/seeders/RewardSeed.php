<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RewardSeed extends Seeder
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
                'reward_title' => 'Pulsa 5K',
                'reward_description' => 'Tukarkan coin kamu untuk dapatkan pulsa senilai 5.000 untuk semua operator.',
                'reward_cost' => 50
            ],
            [
                'reward_title' => 'Voucher Google Play 10K',
                'reward_description' => 'Tukarkan coin kamu untuk mendapatkan Voucher Google Play senilai 10.000',
                'reward_cost' => 100
            ],
            [
                'reward_title' => 'Kaos Coin News',
                'reward_description' => 'Tukarkan coin kamu untuk mendapatkan kaos Coin News',
                'reward_cost' => 150
            ]
        ];
        DB::table('rewards')->insert($data);
    }
}
