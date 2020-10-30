<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sys_name')->nullable();
            $table->string('sys_title')->nullable();
            $table->longText('sys_info')->nullable();
            $table->string('sys_address')->nullable();
            $table->string('sys_email')->nullable();
            $table->string('sys_phone')->nullable();
            $table->string('sys_open_hour')->nullable();
            $table->string('sys_avatar')->nullable();
            $table->string('sys_zalo')->nullable();
            $table->string('sys_fb')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('systems');
    }
}
