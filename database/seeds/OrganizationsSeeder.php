<?php

use Illuminate\Database\Seeder;

class OrganizationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organizations = [
            [
                'name' => 'AstanaHub',
                'slug' => 'astanahub',
            ],
            [
                'name' => 'TechGarden',
                'slug' => 'techgarden',
            ],
            [
                'name' => 'АО ЦИИТ',
                'slug' => 'ciit'
            ]
        ];
    }
}
