<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationFormFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_form_fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_form_id');
            $table->unsignedBigInteger('form_field_id');
            $table->string('value')->nullable();
            $table->timestamps();

            $table->foreign('application_form_id')
                ->references('id')
                ->on('application_forms')
                ->onDelete('cascade');

            $table->foreign('form_field_id')
                ->references('id')
                ->on('form_fields')
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
        Schema::dropIfExists('application_form_fields');
    }
}
