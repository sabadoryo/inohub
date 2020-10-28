<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_module', function (Blueprint $table) {
            $table->unsignedBigInteger('form_id');
            $table->unsignedBigInteger('module_id');
            $table->tinyInteger('order_number');

            $table->unique(['form_id', 'module_id']);

            $table->foreign('form_id')
                ->references('id')
                ->on('forms')
                ->onDelete('restrict');

            $table->foreign('module_id')
                ->references('id')
                ->on('modules')
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
        Schema::dropIfExists('form_module');
    }
}
