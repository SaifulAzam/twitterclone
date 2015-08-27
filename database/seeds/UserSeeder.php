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
            'avatar' => '/images/cache/large/jasonraimondi.jpg',
            'password' => bcrypt('jason')
        ]);

        $user->create([
            'role_id' => 1,
            'name' => 'Jason Raimondi1',
            'username' => 'jasonraimondi1',
            'email' => 'jason@raimondi1.us',
            'avatar' => '/images/cache/large/jasonraimondi.jpg',
            'password' => bcrypt('jason')
        ]);

        $user->create([
            'role_id' => 1,
            'name' => 'Jason Raimondi2',
            'username' => 'jasonraimondi2',
            'email' => 'jason@raimondi2.us',
            'avatar' => '/images/cache/large/jasonraimondi.jpg',
            'password' => bcrypt('jason')
        ]);

        factory(App\User::class, 49)->create();

    }
}
