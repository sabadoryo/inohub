<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manager_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('application_id')->nullable();
            $table->string('company_name');
            $table->string('project_name');
            $table->text('project_description');
            $table->string('address');
            $table->text('expected_result');
            $table->string('application_file_path');
            $table->string('register_certificate_file_path');
            $table->string('absence_tax_file_path');
            $table->string('status')->default('active');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict');

            $table->foreign('manager_id')
                ->references('id')
                ->on('users')
                ->onDelete('restrict');

            $table->foreign('application_id')
                ->references('id')
                ->on('applications')
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
        Schema::dropIfExists('members');
    }
}
