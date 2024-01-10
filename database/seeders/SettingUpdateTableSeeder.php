<?php

namespace Ophim\Core\Database\Seeders;

use Backpack\Settings\app\Models\Setting;
use Illuminate\Database\Seeder;

class SettingUpdateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $players = [
            [
                'key' => 'jwplayer_sub_file_default',
                'description' => 'jwplayer_sub_file_default',
                'name' => 'Jwplayer subtitle default',
                'field' => json_encode([
                    'name' => 'value',
                    'type' => 'ckfinder',
                ]),
                'active' => 0,
            ],
        ];

        foreach ($players as $index => $setting) {
            $result = Setting::firstOrCreate(collect($setting)->only('key')->toArray(), collect($setting)->merge(['group' => 'jwplayer'])->except('key')->toArray());

            if (!$result) {
                $this->command->info("Insert failed at record $index");

                return;
            }
        }
    }
}