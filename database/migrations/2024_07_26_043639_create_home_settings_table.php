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
        Schema::create('home_settings', function (Blueprint $table) {
            $table->id();
            $table->string('spotlight')->nullable();
            $table->json('editor_pick')->nullable();
            $table->json('spotlight_second')->nullable();
            $table->json('policy_stream')->nullable();
            $table->json('trending')->nullable();
            $table->json('tailored_for_policymakers')->nullable();
            $table->string('latest_issue')->nullable();
            $table->json('latest_issue_post')->nullable();
            $table->json('latest_category')->nullable();

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
        Schema::dropIfExists('home_settings');
    }
};
