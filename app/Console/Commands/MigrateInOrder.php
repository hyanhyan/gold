<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrateInOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'MigrateInOrder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This method migrate tables in order';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /** Specify the names of the migrations files in the order you want to
         * loaded
         * $migrations =[
         *               'xxxx_xx_xx_000000_create_nameTable_table.php',
         *    ];
         */
        $migrations = [
            '2014_10_12_000000_create_users_table.php',
            '2014_10_12_100000_create_password_resets_table.php',
            '2019_08_19_000000_create_failed_jobs_table.php',
            '2020_04_25_095654_create_permission_tables.php',
            '2020_08_19_082140_create_metals_table.php',
            '2020_08_19_094634_create_rates_table.php',
            '2020_08_24_074757_create_cities_table.php',
            '2020_08_24_075429_create_brands_table.php',
            '2020_08_24_075715_create_product_types_table.php',
            '2020_08_23_130046_create_products_table.php',
            '2020_08_25_174101_create_product_translations_table.php',
            '2020_09_17_064920_create_rate_histories_table.php',
            '2020_11_16_213203_create_user_infos_table.php',
            '2020_11_21_142308_create_rate_globals_table.php',
            '2020_11_21_142349_create_rate_global_histories_table.php',
            '2021_01_31_182703_create_services_table.php',
            '2021_02_09_141717_create_stones_table.php'
        ];

        foreach($migrations as $migration)
        {
            $basePath = 'database/migrations/';
            $migrationName = trim($migration);
            $path = $basePath.$migrationName;
            $this->call('migrate:refresh', [
                '--path' => $path ,
            ]);
        }
    }
}
