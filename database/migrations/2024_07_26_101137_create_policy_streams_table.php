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
        Schema::create('policy_streams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('tag_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('slug');
            $table->string('post_type');
            $table->string('author_id');
            $table->string('post_date');
            $table->string('image');
            $table->longText('description');
            $table->boolean('status')->default(true);

            // seo column
            $table->string('meta_title');
            $table->json('meta_tag');
            $table->string('meta_description');

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
        Schema::dropIfExists('policy_streams');
    }
};
