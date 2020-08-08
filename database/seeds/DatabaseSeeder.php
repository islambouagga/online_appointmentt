<?php

use App\Admin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $admin =  Admin::create();
        DB::table('users')->insert([
            'name' => 'admin'.$admin->id,
            'email' => 'admin'.$admin->id.'@gmail.com',
            'usertable_id' => $admin->id,
            'usertable_type' =>'Admin',
            'approved' =>'approved',
            'password' => Hash::make('password'),
        ]);
        // $this->call(UserSeeder::class);
    }
}
