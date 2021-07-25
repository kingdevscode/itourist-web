<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->unsignedInteger('note');
            //$table->unsignedBigInteger('user_id')->comment('utilisateur qui note')->unique();
            $table->unsignedBigInteger('user_id')->comment('utilisateur qui note');
            $table->unsignedBigInteger('marker_id')->comment('utilisateur qu\'on note')->nullable();
            $table->unsignedBigInteger('article_id')->comment('article qui est note')->nullable();
            $table->unsignedBigInteger('logement_id')->comment('logement qui est note')->nullable();
            $table->unsignedBigInteger('site_id')->comment('site qui est note')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('marker_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('logement_id')->references('id')->on('logements')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('notes');
    }
}
