<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSMSolutionCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_m_solution_companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('site');
            $table->text('description')->nullable();
            $table->text('solutions')->nullable();
            $table->string('presentation_path')->nullable();
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
        Schema::dropIfExists('s_m_solution_companies');
    }
}
