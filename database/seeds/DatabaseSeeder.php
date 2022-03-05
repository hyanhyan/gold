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
        $this->call(CreateAdminUserSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(MetalSeeder::class);
        $this->call(ProductTypeSeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(RateSeeder::class);
        $this->call(CountrySeeder::class);
    }
}
