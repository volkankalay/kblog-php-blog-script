<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categories=['Varsayılan'];
      foreach ($categories as $kat) {
          DB::table('categories')->insert([
            'name'=>$kat,
            'slug'=>Str::slug($kat),
            'created_at'=>now(),
            'updated_at'=>now(),
          ]);
        }
    }
}
