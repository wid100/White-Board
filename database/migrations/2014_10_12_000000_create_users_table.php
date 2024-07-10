<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->unsignedBigInteger('role_id')->default(2);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('region')->nullable();
            $table->string('city')->nullable();
            $table->string('nid')->nullable();
            $table->boolean('status')->default(1);
            $table->string('ip')->nullable();
            $table->text('about')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('verification_code', 6)->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            // Create foreign key only if the roles table exists
            if (Schema::hasTable('roles')) {
                $table->foreign('role_id')->references('id')->on('roles');
            }
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
};
