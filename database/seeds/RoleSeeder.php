<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = new \App\Role;

        $role->create([
            'name' => 'super',
            'description' => 'Overlord super admin'
        ]);

        $role->create([
            'name' => 'user',
            'description' => 'Regular User'
        ]);

    }
}
