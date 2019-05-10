<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Admin View
        DB::statement(
            "CREATE VIEW admins AS
    SELECT id,
           username,
           password,
           type,
           created_at,
           updated_at,
           remember_token
    FROM tasksman.users
             JOIN tasksman.login ON user_id = users.id");
        DB::statement("CREATE VIEW voters AS
    SELECT id,
           voter.code,
           survey_id,
           username,
           created_at,
           updated_at,
           remember_token
    FROM tasksman.users
             JOIN tasksman.voter ON user_id = id
             JOIN tasksman.survey_code ON voter.code = survey_code.code;");
        DB::statement("CREATE VIEW candidates AS
    SELECT id,
           url,
           survey_id,
           name,
           bio,
           created_at,
           updated_at,
           remember_token
    FROM tasksman.users
             JOIN tasksman.candidate ON users.id = candidate.user_id
             JOIN tasksman.profile ON users.id = profile.user_id;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW voters");
        DB::statement("DROP VIEW admins");
        DB::statement("DROP VIEW candidates");
    }
}
