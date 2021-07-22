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
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('tel')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile')->nullable();
<<<<<<< HEAD
            //$table->unsignedBigInteger('ville_id'); //required
            //$table->foreign('ville_id')->references('id')->on('villes')->onDelete('restrict')->onUpdate('cascade');
=======
           // $table->unsignedBigInteger('ville_id'); //required
           // $table->foreign('ville_id')->references('id')->on('villes')->onDelete('restrict')->onUpdate('cascade');
>>>>>>> 0b60c610d5e12dc6b4bf6f4b1fa7e0c252d58786
            $table->rememberToken();
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
