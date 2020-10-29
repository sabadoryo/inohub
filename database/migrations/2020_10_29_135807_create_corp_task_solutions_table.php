<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorpTaskSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corp_task_solutions', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->text('description');
            $table->string('company_site');
            $table->unsignedBigInteger('task_id');
            $table->timestamps();

            $table->foreign('task_id')
                ->references('id')
                ->on('corp_tasks')
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
        Schema::dropIfExists('corp_task_solutions');
    }
}
