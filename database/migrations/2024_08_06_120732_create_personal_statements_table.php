<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_personal_statements_table.php

// database/migrations/xxxx_xx_xx_xxxxxx_add_user_id_to_personal_statements_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToPersonalStatementsTable extends Migration
{
    public function up()
    {
        Schema::table('personal_statements', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('personal_statements', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
