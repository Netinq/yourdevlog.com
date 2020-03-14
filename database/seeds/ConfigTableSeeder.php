<?php

use Illuminate\Database\Seeder;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('config')->insert(['name' => 'maintenance']);
        DB::table('config')->insert(['name' => 'devlog']);
        DB::table('config')->insert(['name' => 'websites_limit']);
    }
}
