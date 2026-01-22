<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            SettingsSeeder::class,
            DemoCustomerSeeder::class,
            ClinicStoreSeeder::class,
            ReviewSeeder::class,
            TestimonialSeeder::class,
            
            
        ]);
    }
}
