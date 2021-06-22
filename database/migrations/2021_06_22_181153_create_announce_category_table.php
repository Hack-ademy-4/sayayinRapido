<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnounceCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announce_category', function (Blueprint $table) {
            $table->id();
            //id de anuncio
            $table->unsignedBigInteger('announce_id');
            $table->foreign('announce_id')->references('id')->on('announcements')->onDelete("cascade");

            //id de categoria
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('announce_category');
    }
}
