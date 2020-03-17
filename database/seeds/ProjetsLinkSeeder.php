<?php

use Illuminate\Database\Seeder;
use App\Website;

class ProjetsLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projets_links')->insert([
            'name' => 'Jeu de plateforme',
            'code' => 'ICJP10',
            'students' => 'Quentin SAR, Emillien GALLON, Hugo CHARBONNEAU'
        ]);
        
        $website = new Website();
        $website->name = 'Jeu de plateforme';
        $website->url = 'https://yourdevlog.com';
        $website->is_isn = true;
        $website->save();
    }
}
