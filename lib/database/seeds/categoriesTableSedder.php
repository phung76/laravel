<?php

use Illuminate\Database\Seeder;

class categoriesTableSedder extends Seeder
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
                'cate_name'=>'iphone',
                'cate_slug'=>('iphone')        
            ],
            [
                'cate_name'=>'samsung',
                'cate_slug'=>('samsung')
            ]
            ];
        DB::table('vp_categories')->insert($data);
    }
}
