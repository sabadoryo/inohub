<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('short_description');
            $table->text('description');
//            $table->unsignedBigInteger('');
            $table->text('audience');
            $table->text('benefits');
            $table->text('requirements');
            $table->dateTime('limit_date');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('status');
            $table->boolean('project_include');
            $table->timestamps();

//            $table->foreign('user_id')
//                ->references('id')
//                ->on('users')
//                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
