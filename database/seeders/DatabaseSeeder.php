<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //$this->call(StateSeeder::class);
        // \App\Models\User::factory(10)->create();

        /* \App\Models\Admin::create([
            'name' => 'louanes mokhfui',
            'email' => 'louanes.mokhfi@gmail.com',
            'password' => bcrypt('123456')
        ]); */

        \App\Models\Settings::create([
            'logo' => '',
            'site_name' => 'Bouzaouia Library',
            'email' => 'louanes.mokhfi@gmail.com'
        ]);
    }
}
