<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompletedQuizzesTable extends Migration
{
    public function up(): void
    {
        Schema::create('completed_quizzes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('quiz_id');
            $table->integer('correct_answers');
            $table->integer('incorrect_answers');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('completed_quizzes');
    }
}
