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
            $table->unsignedBigInteger('category_id')->nullable()->after('user_id');
            
            // Add foreign key constraint if you have a categories table
            $table->foreign('category_id')->references('id')->on('personal_statement_categories')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('personal_statements', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    
};
