<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Logins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
        {
          Schema::create('logins', function (Blueprint $table) {
              $table->id();
              $table->string('ip_address', 45)->nullable();
              $table->text('user_agent')->nullable();
              $table->timestamp('giris')->nullable();
             });
         }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('logins');
    }
}
