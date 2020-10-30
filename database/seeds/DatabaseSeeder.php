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
        DB::table('form_module')->delete();
        DB::table('form_program')->delete();
        DB::table('applications')->delete();
        DB::table('users')->delete();
        DB::table('organizations')->delete();
        DB::table('modules')->delete();
        $this->call(ModulesSeeder::class);
        $this->call(OrganizationsSeeder::class);
    }
}
