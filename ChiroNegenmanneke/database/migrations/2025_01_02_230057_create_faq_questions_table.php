<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
{
    Schema::create('faq_questions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('category_id')->constrained('faq_categories')->onDelete('cascade');
        $table->string('question');
        $table->text('answer');
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('faq_questions');
    }
};
