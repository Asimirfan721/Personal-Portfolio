<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('personal_statements', function (Blueprint $table) {
            if (!Schema::hasColumn('personal_statements', 'category_id')) {
                $table->unsignedBigInteger('category_id')->nullable()->after('user_id');
                $table->foreign('category_id')
                      ->references('id')
                      ->on('personal_statement_categories')
                      ->onDelete('cascade');
            }
        });
    }

    /*
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('personal_statements', function (Blueprint $table) {
            if (Schema::hasColumn('personal_statements', 'category_id')) {
                $table->dropForeign(['category_id']);
                $table->dropColumn('category_id');
            }
        });
    }
};
