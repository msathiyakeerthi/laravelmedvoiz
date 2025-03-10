<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('language');
            $table->longText('text')->nullable();
            $table->longText('raw')->nullable();
            $table->string('speech_type')->nullable();
            $table->string('file_url')->nullable();
            $table->string('file_name')->nullable();
            $table->string('format')->nullable();
            $table->string('task_id')->nullable();
            $table->string('name')->nullable();
            $table->unsignedDecimal('length', 15, 3)->nullable();
            $table->integer('words')->nullable();
            $table->string('plan_type')->comment('free|paid');
            $table->string('audio_type')->nullable();
            $table->string('status')->nullable();
            $table->string('mode')->nullable()->comment('record|file');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
