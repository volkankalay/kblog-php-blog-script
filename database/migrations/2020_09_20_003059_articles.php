<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Articles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->string('image')->nullable();
            $table->longText('content');
            $table->string('semicontent')->nullable();
            $table->integer('hit')->default(0);
            $table->integer('status')->default(0)->comment('0:taslak, 1:Aktif');
            $table->string('slug')->unique();
            $table->string('tags')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
