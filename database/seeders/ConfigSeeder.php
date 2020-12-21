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
        'background'=>'https://i.hizliresim.com/EXJ3am.jpg',
        'favicon'=>'https://i.hizliresim.com/g6NJHH.jpg',
        'active'=>'1',
        'github'=>'https://www.github.com/volkankalay',
        'other'=>'https://www.vlkn.icu',
        'created_at'=>now(),
        'updated_at'=>now()
      ]);
    }
}
