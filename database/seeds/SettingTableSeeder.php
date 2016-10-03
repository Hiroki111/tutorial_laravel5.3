<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'key'  => 'email',
            'json' => json_encode(array('data' => '@gmail.com')),
        ]);
    }
}
