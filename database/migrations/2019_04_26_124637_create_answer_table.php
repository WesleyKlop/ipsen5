<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer', function (Blueprint $table) {
            $table->uuid('proposition_id');
            $table->uuid('survey_id');
            $table->uuid('user_id');
            $table->boolean('answer');

            $table->primary(['proposition_id', 'survey_id', 'user_id']);
            $table->foreign(['proposition_id', 'survey_id'])->references(['id', 'survey_id'])->on('proposition');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer');
    }
}
