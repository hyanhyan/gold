<?php

use Illuminate\Database\Seeder;
use App\ProductType;
use Illuminate\Support\Facades\DB;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('product_types')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        $product_types = [
            '1' => array(
                'RINGS',
                'JEWELERY',
                7,
                1

            ),
            '2' => array(
                'WEDDING_RINGS',
                'JEWELERY',
                1,
                1
            ),
            '3' => array(
                'NECKLACES',
                'JEWELERY',
                7,
                1
            ),
            '4' => array(
                'CROSSES',
                'JEWELERY',
                7,
                1
            ),
            '5' => array(
                'SETS',
                'JEWELERY',
                1,
                1
            ),
            '6' => array(
                'EARRINGS',
                'JEWELERY',
                5,
                1
            ),
            '7' => array(
                'PENDANTS',
                'JEWELERY',
                7,
                1
            ),
            '8' => array(
                'BRACELETS',
                'JEWELERY',
                7,
                1
            ),
            '9' => array(
                'NECKLETS',
                'JEWELERY',
                7,
                1
            ),
            '10' => array(
                'CHARMS',
                'JEWELERY',
                7,
                1
            ),
            '11' => array(
                'CHOKER',
                'JEWELERY',
                5,
                1
            ),
            '12' => array(
                'COINS',
                'JEWELERY',
                7,
                1
            ),
            '13' => array(
                'OTHER',
                'JEWELERY',
                7,
                1
            ),


            '14' => array(
                'KNIVES',
                'TABLEWARE',
                7,
                2
            ),
            '15' => array(
                'LADLES',
                'TABLEWARE',
                7,
                2
            ),
            '16' => array(
                'VASES',
                'TABLEWARE',
                7,
                2
            ),
            '17' => array(
                'TABLEWARE_SETS',
                'TABLEWARE',
                7,
                2
            ),
            '18' => array(
                'CUPS',
                'TABLEWARE',
                7,
                2
            ),
            '19' => array(
                'FORKS',
                'TABLEWARE',
                7,
                2
            ),
            '20' => array(
                'TABLE_SETTING',
                'TABLEWARE',
                7,
                2
            ),
            '21' => array(
                'BOX',
                'BOX',
                7,
                3
            ),
            '22' => array(
                'MECHANICAL',
                'WATCH',
                7,
                4
            ),
            '23' => array(
                'AUTOMATIC',
                'WATCH',
                7,
                4
            ),
            '24' => array(
                'OTHER_GEAR',
                'WATCH',
                7,
                4
            )

        ];

        foreach ($product_types as $key => $product_type) {
            ProductType::create(
                [
                    'id' => $key,
                    'name' => $product_type[0],
                    'product_global_name' =>  $product_type[1],
                    'product_permission' => $product_type[2],
                    'product_global_type' =>  $product_type[3]
                ]
            );
        }
    }
}
