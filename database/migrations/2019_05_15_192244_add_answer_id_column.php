<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAnswerIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->timestamps();
            // Prepend id column
            $table->uuid('id')->first();
            $table->dropPrimary();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->dropPrimary();
            $table->primary(['proposition_id', 'survey_id', 'user_id']);
            $table->dropColumn('id');
            $table->dropTimestamps();
        });
    }
}
