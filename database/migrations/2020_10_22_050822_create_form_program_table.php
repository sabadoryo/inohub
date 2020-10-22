<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_program', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('form_id');
            $table->unsignedBigInteger('program_id');

            $table->foreign('form_id')
                ->references('id')
                ->on('forms')
                ->onDelete('cascade');
            $table->foreign('program_id')
                ->references('id')
                ->on('programs')
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
        Schema::dropIfExists('form_program');
    }
}
