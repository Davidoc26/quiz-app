<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderColumnToAnswersTable extends Migration
{
    public function up(): void
    {
        Schema::table('answers', static function (Blueprint $table) {
            $table->addColumn('integer', 'order');
        });
    }

    public function down(): void
    {
        Schema::table('answers', static function (Blueprint $table) {
            $table->dropColumn('order');
        });
    }
}
