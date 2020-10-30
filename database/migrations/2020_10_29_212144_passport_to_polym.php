<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PassportToPolym extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('passports', function (Blueprint $table) {
//            $table->dropForeign('passports_program_id_foreign');
//            $table->dropForeign('passports_event_id_foreign');
//            $table->dropColumn('program_id');
//            $table->dropColumn('event_id');
//            $table->dropColumn('type');
//            $table->string('entity_type');
//            $table->unsignedBigInteger('entity_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('passports', function (Blueprint $table) {
            $table->unsignedBigInteger('program_id')->nullable();
            $table->foreign('program_id')
                ->references('id')
                ->on('programs')
                ->onDelete('cascade');
            $table->unsignedBigInteger('event_id')->nullable();
            $table->foreign('event_id')
                ->references('id')
                ->on('events')
                ->onDelete('cascade');
            $table->dropColumn(['entity_type', 'entity_id']);
        });
    }
}
