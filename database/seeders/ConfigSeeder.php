<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('configs')->insert([
        'title'=>'KBlog',
        'background'=>'#',
        'favicon'=>'#',
        'active'=>'1',
        'facebook'=>'https://www.facebook.com',
        'instagram'=>'https://www.instagram.com',
        'twitter'=>'https://www.twitter.com',
        'github'=>'https://www.github.com',
        'created_at'=>now(),
        'updated_at'=>now()
      ]);
    }
}
