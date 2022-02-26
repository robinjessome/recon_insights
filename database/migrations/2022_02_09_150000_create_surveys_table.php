<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('surveyId')->unique();
            $table->enum('status', ['archived','expired','draft','scheduled','published'])->default('draft');
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('featuredImage')->nullable();
            $table->json('content')->nullable();
            $table->dateTime('publishDate')->nullable();
            $table->dateTime('expireDate')->nullable();
            $table->string('author')->nullable();
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
        Schema::dropIfExists('surveys');
    }
}
