<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreatePersonalStatementsTable extends Migration
{
    public function up()
    {          
        Schema::create('personal_statements', function (Blueprint $table) {
            $table->id();
            $table->string('statement');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }    

    public function down()
    {
        Schema::dropIfExists('personal_statements');
    }
}
     