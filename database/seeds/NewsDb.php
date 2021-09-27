<?php

use Illuminate\Database\Seeder;

class NewsDb extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++){
            $add = new \App\NewsModel();
            $add->title = 'Test_' . rand();
            $add->add_by = 'User_id_ ' . rand();
            $add->desc = rand(0,15);
            $add->content = 'User_email@ ' . rand();
            $add->status = 'active';
            $add->save();
        }
    }
}
