<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('personal_statements', function (Blueprint $table) {
            $table->id(); // referenced by 'category_id' in 'personal_statements'
            $table->string('name'); // optional
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personal_statement_categories');
    }
};
