<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposition', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('survey_id');
            $table->string('proposition');

            $table->primary(['id', 'survey_id']);
            $table->foreign('survey_id')->references('id')->on('survey');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposition');
    }
}
