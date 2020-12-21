<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class articleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      for($i=0;$i<5;$i++){
      $title=$faker->sentence(5);
        DB::table('articles')->insert([
          'category_id'=>rand(1,5),
          'title'=>$title,
          'image'=>$faker->imageUrl(800,600,'cats', true, 'KBLOG'),
          'content'=>$faker->paragraphs(5, true),
          'status'=>rand(0,1),
          'slug'=>Str::slug($title),
          'tags'=>'etiket'.rand(1,10).',etiket'.rand(1,10).',etiket'.rand(1,10),
          'created_at'=>now(),
          'updated_at'=>now()
        ]);
      }
    }
}
