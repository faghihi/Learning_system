<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id'   => 1,
            'name' => 'رفع اشکال'
        ]);
        DB::table('categories')->insert([
            'id'   => 2,
            'name' => 'درخواست عضویت'
        ]);
        DB::table('categories')->insert([
            'id'   => 3,
            'name' => 'تمرین'
        ]);
    }
}
