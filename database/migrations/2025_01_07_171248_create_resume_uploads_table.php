<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumeUploadsTable extends Migration
{
    public function up()
    {
        Schema::create('resume_uploads', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('file_path'); // Path to the uploaded file
            $table->text('description')->nullable(); // Description of the file
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }
  
    public function down()
    {
        Schema::dropIfExists('resume_uploads');
    }
}
