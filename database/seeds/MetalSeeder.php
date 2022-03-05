<?php

use Illuminate\Database\Seeder;
use App\Metal;
use Illuminate\Support\Facades\DB;

class MetalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('metals')->delete();
        DB::table('rates')->delete();
        DB::table('rate_globals')->delete();

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        $metals = [
            '1'=>'GOLD',
            '2'=>'SILVER',
            '3'=>'PLATINUM',
            '4'=>'PALLADIUM',
            '5'=>'VELVET',
            '6'=>'LEATHERETTE',
            '7'=> 'WOOD'
        ];

        foreach ($metals as $key => $metal) {
            Metal::create(['name' => $metal, 'id' => $key]);
        }

        $globalMetals = [
            '1'=>'1',
            '13'=>'2',
            '14'=>'3',
            '15'=>'4',
        ];

        foreach ($globalMetals as $key => $metal) {
            \App\RateGlobal::create(['id' => $key, 'metal_id' => $metal]);
        }


    }
}
