<?php

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
        // $this->call(UserSeeder::class);
        $data=[
             [
            'email'=>'ngocphung@gmail.com',
            'password'=>bcrypt('0123021'),
            'lever'=>1
        ],
        [
            'email'=>'ngoc@gmail.com',
            'password'=>bcrypt('0123021'),
            'lever'=>2,
        ],
        ];
        DB::table('vp_users')->insert($data);
    }
}
