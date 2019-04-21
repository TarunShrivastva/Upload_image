<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('profile_image');
            $table->integer('age');
            $table->text('address');
            $table->string('contact_number');
            $table->string('latitude');
            $table->string('longitude');
            $table->enum('user_type', [0, 1, 2]);
            $table->enum('login_by', [0, 1, 2]);
            $table->string('hash');
            $table->string('api_token');
            $table->enum('is_verified',[0,1]);
            $table->enum('status', [0, 1]);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
