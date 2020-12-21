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
      $title = 'İlk Blog Yazım!';
        DB::table('articles')->insert([
          'category_id'=>1,
          'title'=>$title,
          'image'=>'https://i.hizliresim.com/f0p50y.png',
          'content'=>'İlk Blog Yazımız. KBlog kullandığınız için teşekkürler!',
          'semicontent'=>'KBlog kullandığınız için teşekkürler!',
          'status'=>1,
          'slug'=>Str::slug($title),
          'tags'=>'hoşgeldiniz',
          'created_at'=>now(),
          'updated_at'=>now()
        ]);
    }
}
