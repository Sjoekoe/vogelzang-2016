<?php

use App\Riders\Rider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBirthdaysToRiders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Rider::TABLE, function (Blueprint $table) {
            $table->timestamp('birth_day');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Rider::TABLE, function (Blueprint $table) {
            $table->dropColumn('birth_day');
        });
    }
}
