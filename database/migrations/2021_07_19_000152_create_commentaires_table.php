<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->string('texte');
            $table->unsignedBigInteger('user_id')->comment('utilisateur qui commente');
            $table->unsignedBigInteger('speaker_id')->comment('utilisateur qu\'on commenter')->nullable();
            $table->unsignedBigInteger('article_id')->comment('article qui est commenter')->nullable();
            $table->unsignedBigInteger('logement_id')->comment('logement qui est commenter')->nullable();
            $table->unsignedBigInteger('site_id')->comment('site qui est commenter')->nullable();
            $table->foreign('speaker_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('logement_id')->references('id')->on('logements')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('site_id')->references('id')->on('site')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('commentaires');
    }
}
