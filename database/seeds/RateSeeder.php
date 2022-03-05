<?php

use App\Rate;
use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('rates')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        $rates = [
            '1' => array(
                1,
                '999',
                0.00,
                0.00
            ),
            '2' => array(
                1,
                '995',
                0.00,
                0.00
            ),
            '3' => array(
                1,
                '958',
                0.00,
                0.00
            ),
            '4' => array(
                1,
                '916',
                0.00,
                0.00
            ),
            '5' => array(
                1,
                '875',
                0.00,
                0.00
            ),
            '6' => array(
                1,
                '750',
                0.00,
                0.00
            ),
            '7' => array(
                1,
                '585',
                0.00,
                0.00
            ),
            '8' => array(
                1,
                '416',
                0.00,
                0.00
            ),
            '9' => array(
                1,
                '375',
                0.00,
                0.00
            ),
            '10' => array(
                1,
                '333',
                0.00,
                0.00
            ),
            '11' => array(
                1,
                '900',
                0.00,
                0.00
            ),
            '13' => array(
                2,
                '999',
                0.00,
                0.00
            ),
            '14' => array(
                3,
                '999',
                0.00,
                0.00
            ),
            '15' => array(
                4,
                '999',
                0.00,
                0.00
            ),
            '16' => array(
                2,
                '995',
                0.00,
                0.00
            ),
        ];

        foreach ($rates as $key => $rate) {
            Rate::create(
                [
                    'id' => $key,
                    'metal_id' => $rate[0],
                    'purity' =>  $rate[1],
                    'buy' =>  $rate[2],
                    'sell' =>  $rate[3]
                ]
            );
        }
    }
}
