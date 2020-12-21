<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('article_id');
            $table->unsignedBigInteger('ifConnectedToComment')->nullable();
            $table->string('email');
            $table->string('name');
            $table->longText('comment');
            $table->integer('status')->default(0)->comment('0:izinsiz, 1:Aktif');
            $table->integer('like')->default(0);
            $table->integer('dislike')->default(0);
            $table->timestamps();

            $table->foreign('article_id')
                  ->references('id')
                  ->on('articles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
