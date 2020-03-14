<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
