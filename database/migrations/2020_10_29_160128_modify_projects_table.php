<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('company_name')->after('title');
            $table->string('link')->after('company_name');
            $table->text('description')->after('link');
            $table->string('image_path')->after('description');
            $table->string('status')->default('check')->after('image_path');
            $table->dateTime('published_at')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropColumn('company_name');
            $table->dropColumn('link');
            $table->dropColumn('description');
            $table->dropColumn('image_path');
            $table->dropColumn('status');
            $table->dropColumn('published_at');
        });
    }
}
