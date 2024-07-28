<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HomeSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home_settings')->insert([
            'spotlight' => '1',
            'latest_issue' => '1',
            'editor_pick' => json_encode([1]),
            'spotlight_second' => json_encode([1]),
            'policy_stream' => json_encode([1]),
            'trending' => json_encode([1]),
            'tailored_for_policymakers' => json_encode([1]),
            'latest_issue_post' => json_encode([1]),
            'latest_category' => json_encode([1]),
        ]);
    }
}
