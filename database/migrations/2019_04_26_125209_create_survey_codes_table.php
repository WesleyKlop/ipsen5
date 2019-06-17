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
            $table->uuid('user_id');
            $table->uuid('survey_id');
            $table->timestamp('expire');

            $table->foreign(['user_id'])->references(['user_id'])->on('admins');
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
