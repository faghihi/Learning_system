<?php

use Illuminate\Database\Seeder;

class GradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->insert([
            'id'   => 1,
            'name' => 'دهم',
            'part' => Null
        ]);
        DB::table('grades')->insert([
            'id'   => 2,
            'name' => 'یازدهم',
            'part' => Null
        ]);
        DB::table('grades')->insert([
            'id'   => 3,
            'name' => 'دوازدهم',
            'part' => Null
        ]);
    }
}
