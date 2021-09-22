<?php

use Illuminate\Database\Seeder;

class UsersDb extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++){
            $add = new \App\UsersModel();
            $add->username = 'User_ ' . rand();
            $add->address = 'User_address ' . rand();
            $add->age = rand(0,15);
            $add->email = 'User_email@ ' . rand();
            $add->phone = 'User_phone ' . rand();
            $add->save();
        }
    }
}
