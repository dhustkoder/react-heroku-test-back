<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'rafaelmoura',
            'email' => 'rafaelmoura.dev@gmail.com',
            'password' => 'scretet_shh',
        ]);
    }
}
