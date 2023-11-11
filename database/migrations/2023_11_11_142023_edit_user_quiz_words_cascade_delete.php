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
        Schema::table('user_quiz_words', function (Blueprint $table) {
            // Drop existing foreign key constraint
            $table->dropForeign(['user_id']);

            // Recreate the foreign key with onDelete('cascade')
            $table->foreign('user_id')
                ->references('id') // Assuming the 'users' table has a primary key named 'id'
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_quiz_words', function (Blueprint $table) {
            // Drop the foreign key constraint in the down method
            $table->dropForeign(['user_id']);

            // Recreate the foreign key without onDelete('cascade')
            $table->foreign('user_id')
                ->references('id') // Assuming the 'users' table has a primary key named 'id'
                ->on('users');
        });
    }
};
