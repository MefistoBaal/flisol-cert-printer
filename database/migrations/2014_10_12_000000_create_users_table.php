<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id')->unsigned();
            $table->string('first_names');
            $table->string('last_names');
            $table->enum('doc_type', ['CC', 'Passport', 'TI', 'NIT']);
            $table->bigInteger('document')->nullable(false);
            $table->string('email', 60)->unique();
            $table->string('phone')->nullable(false);
            $table->string('mobile_phone');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('default_password')->default(true);
            $table->enum('status', ['0', '1', '2'])->default('2');
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
