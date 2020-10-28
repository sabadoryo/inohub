<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passports', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('program_id')->nullable();
            $table->unsignedBigInteger('event_id')->nullable();
            $table->string('type')->nullable();
            $table->longText('content')->nullable();

            $table->foreign('program_id')
                ->references('id')
                ->on('programs')
                ->onDelete('restrict');

            $table->foreign('event_id')
                ->references('id')
                ->on('events')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passports');
    }
}
