<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_certs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cert_id');
            $table->unsignedBigInteger('rol_id');
            $table->string('verification_code')->unique();
            $table->timestamps();
        });
        Schema::table('user_certs', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('attendee');
            $table->foreign('cert_id')->references('id')->on('cert');
            $table->foreign('rol_id')->references('id')->on('rol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_certs');
    }
}
