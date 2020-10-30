<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProgramsAddOrganizationIdAndDelCatId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->unsignedBigInteger('organization_id');
            $table->foreign('organization_id')
                ->references('id')
                ->on('organizations')
                ->onDelete('cascade');
            $table->dropForeign('programs_program_category_id_foreign');
            $table->dropColumn('program_category_id');
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
            $table->dropForeign('programs_organization_id_foreign');
            $table->dropColumn('organization_id');
            $table->unsignedBigInteger('program_category_id')->nullable();
            $table->foreign('program_categories')
                ->references('id')
                ->on('program_categories')
                ->onDelete('restrict');
        });
    }
}
