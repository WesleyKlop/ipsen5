<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_codes', function (Blueprint $table) {
            $table->string('code', 6)->primary();
            $table->string('username', 32);
            $table->uuid('user_id');
            $table->uuid('survey_id');
            $table->timestampTz('expire');

            $table->foreign(['user_id', 'username'])->references(['user_id', 'username'])->on('admins');
            $table->foreign('survey_id')->references('id')->on('surveys');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_codes');
    }
}