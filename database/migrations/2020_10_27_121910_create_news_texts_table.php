<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_texts', function (Blueprint $table) {
            $table->id();
    
            $table->unsignedBigInteger('news_id');
            $table->text('content');
            $table->integer('order');
            $table->foreign('news_id')
                ->references('id')
                ->on('news')
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
        Schema::dropIfExists('news_texts');
    }
}
