<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangesInEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('status')->default('draft')->after('name');
            $table->text('image_path')->nullable()->change();
            $table->text('short_description')->nullable()->change();
            $table->dateTime('start_date')->change();
            $table->dropColumn('end_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->text('image_path')->change();
            $table->text('short_description')->change();
            $table->dateTime('start_date')->nullable()->change();
            $table->dateTime('end_date')->nullable();
        });
    }
}
