<?php

use Illuminate\Database\Seeder;
use App\Apperance;
use Illuminate\Support\Facades\Hash;
class ApperanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Apperance::create([
           'name'     => 'Coding Crust',
           'logo'    => 'assets/dist/img/AdminLTELogo.png',

        ]);
    }
}
