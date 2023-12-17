<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('last_category_quiz')->nullable()->comment('Last user category for quiz mode')->after('category');
            $table->integer('last_subcategory_quiz')->nullable()->comment('Last user subcategory for quiz mode')->after('subcategory');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('last_category_quiz');
            $table->dropColumn('last_subcategory_quiz');
        });
    }
};
