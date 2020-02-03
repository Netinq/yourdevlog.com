<?php

use Illuminate\Database\Seeder;
use App\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new Type();
        $type->name = 'Maintenance';
        $type->save();
        $type = new Type();
        $type->name = 'Release';
        $type->save();
        $type = new Type();
        $type->name = 'Fix';
        $type->save();
    }
}
