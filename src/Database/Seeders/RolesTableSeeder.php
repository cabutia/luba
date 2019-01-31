<?php

namespace GRG\Luba\Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $config = config('luba.database');
        \DB::table($config['prefix'] . 'roles')->delete();
        \DB::table($config['prefix'] . 'roles')->insert([
            [
                'name' => 'Admin',
                'description' => 'System administrator, usually the developer.'
            ],
            [
                'name' => 'Client',
                'description' => 'The client who owns the project.'
            ]
        ]);
    }
}
