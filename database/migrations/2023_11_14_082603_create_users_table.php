<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('RegistrationDate')->nullable();
            $table->string('Status')->default('Unconfirmed');
            $table->string('ConfirmationToken')->nullable();
            $table->timestamps();
            $table->enum('role', ['user', 'admin'])->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
