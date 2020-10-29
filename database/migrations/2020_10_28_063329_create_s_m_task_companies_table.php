<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSMTaskCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_m_task_companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('site');
            $table->text('manufactured_products')->nullable();
            $table->text('fully_bp')->nullable();
            $table->text('partly_bp')->nullable();
            $table->string('address')->nullable();
            $table->text('actual_tasks')->nullable();
            $table->text('embedded_tasks')->nullable();
            $table->string('icon');
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
        Schema::dropIfExists('s_m_task_companies');
    }
}
