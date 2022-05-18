<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'name'     => 'Admin',
           'email'    => 'admin@demo.com',
           'password' => Hash::make('12345678'),
        ]);
    }
}
