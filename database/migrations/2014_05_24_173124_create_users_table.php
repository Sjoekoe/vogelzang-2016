<?php

use App\Users\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(User::TABLE, function(Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('username');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('password');
            $table->string('password_temp');
            $table->string('code');
            $table->integer('active');
            $table->integer('level_id');
            $table->text('remember_token');
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
        Schema::drop(User::TABLE);
    }

}
