<?php

use Illuminate\Database\Seeder;
//use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       \DB::table('admins')->insert([
            'name'     => 'RobinPMT',
            'email'    => 'phanminhtuan023654@gmail.com',
            'password' => bcrypt('281299'),
            'phone'    => '0332923411',
            'active'   => 1

       ]);
    }
}
