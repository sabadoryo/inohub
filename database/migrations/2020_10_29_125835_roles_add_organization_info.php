<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RolesAddOrganizationInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->string('type');
            $table->unsignedBigInteger('organization_id')->nullable();
            $table->string('label');
//
//            $table->foreign('organization_id')
//                ->references('id')
//                ->on('organizations')
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
        Schema::table('roles', function (Blueprint $table) {
//            $table->dropForeign('roles_organization_id_foreign');
            $table->dropColumn([
                'type',
                'organization_id',
                'label'
            ]);
        });
    }
}
