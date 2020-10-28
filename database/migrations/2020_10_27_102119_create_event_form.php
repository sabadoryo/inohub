<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_form', function (Blueprint $table) {
            $table->unsignedBigInteger('form_id');
            $table->unsignedBigInteger('event_id');
            $table->tinyInteger('order_number');
    
            $table->foreign('form_id')
                ->references('id')
                ->on('forms')
                ->onDelete('restrict');
    
    
            $table->foreign('event_id')
                ->references('id')
                ->on('events')
                ->onDelete('cascade');
    
            $table->unique(['form_id', 'event_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_form');
    }
}
