<?php

use Illuminate\Database\Seeder;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schools')->insert([
            'id'   => 1,
            'name' => 'فرزانگان یک',
            'phone' => 4443335,
            'address' => 'تهران'
        ]);
        DB::table('schools')->insert([
            'id'   => 2,
            'name' => 'علامه حلی',
            'phone' => 1234567,
            'address' => 'تهران'
        ]);
    }
}
