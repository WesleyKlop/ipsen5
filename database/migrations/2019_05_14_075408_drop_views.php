<?php

use Illuminate\Database\Migrations\Migration;

class DropViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('DROP VIEW IF EXISTS admins');
        DB::statement('DROP VIEW IF EXISTS candidates');
        DB::statement('DROP VIEW IF EXISTS voters');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
