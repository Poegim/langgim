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
        Schema::create('user_words', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wordable_id');
            $table->string('wordable_type');
            $table->foreignId('user_id')->constrained();
            $table->integer('wrong_try')->default(0);
            $table->boolean('is_learned')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_words');
    }
};
