<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Faker\Factory as Faker;
class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      for($i=0;$i<10;$i++){
        DB::table('contacts')->insert([
          'name'=>$faker->name,
          'email'=>$faker->email,
          'topic'=>$faker->words(3,true),
          'message'=>$faker->paragraph(4,true),
          'okundu'=>$faker->numberBetween(0,1),
          'created_at'=>now(),
          'updated_at'=>now()
        ]);
      }
    }
}
