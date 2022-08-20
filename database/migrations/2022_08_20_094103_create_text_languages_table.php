<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_languages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sourcetext')->unique();
            $table->unsignedBigInteger('sourcelang')->nullable();
            $table->string('targettext')->unique();
            $table->unsignedBigInteger('targetlang')->nullable();
            $table->string('keyword')->unique();
            $table->enum('status', ['active', 'in-active'])->default('active');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('sourcelang')
                ->references('id')
                ->on('languages')
                ->onDelete('cascade');

            $table->foreign('targetlang')
                ->references('id')
                ->on('languages')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

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
        Schema::dropIfExists('text_languages');
    }
}
