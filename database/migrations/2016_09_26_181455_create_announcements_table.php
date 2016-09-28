<?php

use App\Announcements\Announcement;
use App\Users\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Announcement::TABLE, function (Blueprint $table) {
            $table->increments('id');
            $table->text('body');
            $table->boolean('show');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on(User::TABLE)->onDelete('cascade');
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
        Schema::drop(Announcement::TABLE);
    }
}
