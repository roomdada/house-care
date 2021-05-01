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
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->foreignId('city_id')->constrained()->onDelete('cascade');
            $table->string('phone');
            $table->string('phone_2')->nullable();
            $table->string('phone_3')->nullable();
            $table->string('matricule')->nullable();
            $table->string('genre')->default('M');
            $table->string('token');
            $table->string('materials')->nullable();
            $table->string('compagny')->nullable();
            $table->string('birthday')->nullable();
            $table->string('identity')->nullable();
            $table->string('moving_means')->nullable();
            $table->boolean('validation')->default(0);
            $table->boolean('number_is_watsapp')->default(0);
            $table->boolean('disponible')->default(1);
            $table->boolean('inline')->default(1);
            $table->boolean('admin_validation')->default(0);
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
