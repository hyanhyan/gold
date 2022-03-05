<?php

use Illuminate\Database\Seeder;
use App\Service;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('services')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        $services = [
            '1' => array(
                'renovation',
                '',
                1
            ),
            '2' => array(
                'clockworker',
                '',
                1
            ),
            '3' => array(
                'polishing',
                '',
                1
            ),
            '4' => array(
                'golden_water',
                '',
                1
            ),
            '5' => array(
                'laser_engraving',
                '',
                1
            ),
            '6' => array(
                'casting',
                '',
                1
            ),
            '7' => array(
                'resize',
                '',
                1
            ),
            '8' => array(
                'laser_inspection',
                '',
                1
            ),
            '9' => array(
                'calibration',
                '',
                1
            ),
            '10' => array(
                'chemical_determination',
                '',
                0
            ),
            '11' => array(
                '3d_modeling',
                '',
                0
            ),
            '12' => array(
                'rhodium',
                '',
                1
            ),
            '13' => array(
                'candle_making',
                '',
                0
            ),
            '14' => array(
                'stone_placement',
                '',
                1
            )
        ];

        foreach ($services as $key => $service) {
            Service::create(
                [
                    'id' => $key,
                    'name' => $service[0],
                    'description' =>  $service[1],
                    'for_all' =>  $service[2]
                ]
            );
        }
    }
}
