<?php

use Illuminate\Database\Seeder;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert([
            'id'   => 1,
            'course_id' => 2,
            'name' => 'احتمال تصادفی',
        ]);
        DB::table('sections')->insert([
            'id'   => 2,
            'course_id' => 1,
            'name' => 'دنباله ها',
        ]);
        DB::table('sections')->insert([
            'id'   => 3,
            'course_id' => 1,
            'name' => 'حد و مشتق',
        ]);
        DB::table('sections')->insert([
            'id'   => 4,
            'course_id' => 4,
            'name' => 'حجم مخروط',
        ]);
        DB::table('sections')->insert([
            'id'   => 5,
            'course_id' => 3,
            'name' => 'آنتالپی و آنتروپی',
        ]);
    }
}
