<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('user_name', 100)->nullable(false);
            $table->string('user_email', 150)->unique()->nullable(false);
            $table->string('user_password', 150)->nullable(false);
            $table->boolean('user_verify')->default(false);
            $table->string('user_telp', 20)->nullable();
            $table->string('user_alamat', 150)->nullable();
            $table->string('user_code', 5)->nullable();
            $table->string('user_reffer', 5)->nullable();
            $table->integer('user_point')->unsigned()->nullable()->default(0);
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
        Schema::dropIfExists('users');
    }
}
