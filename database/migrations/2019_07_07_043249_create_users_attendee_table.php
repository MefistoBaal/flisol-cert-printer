<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAttendeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_attendee', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_names');
            $table->string('second_names');
            $table->enum('doc_type', ['CC', 'Passport', 'TI', 'NIT']);
            $table->bigInteger('document');
            $table->string('email');
            $table->string('phone');
            $table->bigInteger('id_rol')->nullable(false)->unsigned();
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
        Schema::dropIfExists('users_attendee');
    }
}
