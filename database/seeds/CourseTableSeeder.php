<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'id'   => 1,
            'name' => 'ریاضی',
            'grade_id' => 1,
            'teacher_name' => 'علی فرجی',
            'image' => '55math-image.jpg'
        ]);
        DB::table('courses')->insert([
            'id'   => 2,
            'name' => 'آمار',
            'grade_id' => 1,
            'teacher_name' => 'علی فرجی',
            'image' => '22amar.jpg'
        ]);
        DB::table('courses')->insert([
            'id'   => 3,
            'name' => 'شیمی',
            'grade_id' => 3,
            'teacher_name' => 'علی محمدی',
            'image' => '60chemistry-credit-recovery.jpg'
        ]);
        DB::table('courses')->insert([
            'id'   => 4,
            'name' => 'هندسه',
            'grade_id' => 2,
            'teacher_name' => 'حسین حسینی',
            'image' => '21hendese.jpg'
        ]);
        DB::table('courses')->insert([
            'id'   => 5,
            'name' => 'ریاضی',
            'grade_id' => 2,
            'teacher_name' => 'علی فرجی',
            'image' => '55math-image.jpg'
        ]);
    }
}
