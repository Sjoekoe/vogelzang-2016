<?php

use App\Faqs\Faq;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Faq::TABLE, function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->integer('sort');
            $table->boolean('visible');
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
        Schema::drop(Faq::TABLE);
    }
}
