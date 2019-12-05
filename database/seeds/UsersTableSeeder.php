<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name'      => 'Sejo',
            'email'     => 'sejocuervo@gmail.com',
            'password'     => bcrypt('sejobg000'),

        ]);

        factory(App\User::class, 7)->create();
    }
}
