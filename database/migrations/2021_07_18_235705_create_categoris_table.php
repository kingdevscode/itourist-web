<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoris', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->string('nom');
            $table->string('description');
            $table->integer('site')->nullable();
            $table->integer('logement')->nullable();
            $table->integer('article')->nullable();
            $table->timestamps();
            // cette table risque une modification en raison du fait qu'on ne peut pas categoriser au meme titre les sites, les logements et les articles
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoris');
    }
}
