<?php

use Illuminate\Database\Seeder;

class usertableseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'email'=>'ngocphung@gmail.com',
                'password'=>bcrypt('01230321'),
                'lever'=>1
            ],
            [
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('01230321'),
                'lever'=>1
            ]
        ];
   
    DB::table('vp_users')->insert($data);
}
}
