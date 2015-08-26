<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new \App\User;

        $user->create([
            'role_id' => 1,
            'name' => 'Jason Raimondi',
            'username' => 'jasonraimondi',
            'email' => 'jason@raimondi.us',
            'avatar' => 'http://lorempixel.com/350/350/people/',
            'password' => bcrypt('jason')
        ]);

        factory(App\User::class, 49)->create();

    }
}
