<?php

namespace GRG\Luba\Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $config = config('luba.database');
        \DB::table($config['prefix'] . 'role_permission')->delete();
        \DB::table($config['prefix'] . 'permissions')->delete();
    }
}
