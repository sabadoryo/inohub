<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryToPrograms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->unsignedBigInteger('program_category_id')
                ->nullable()
                ->after('user_id');

            $table->foreign('program_category_id')
                ->references('id')
                ->on('program_categories')
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
        Schema::table('programs', function (Blueprint $table) {
            $table->dropForeign('programs_program_category_id_foreign');
            $table->dropColumn('program_category_id');
        });
    }
}
