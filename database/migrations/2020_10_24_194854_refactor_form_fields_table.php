<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RefactorFormFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_fields', function (Blueprint $table) {
            $table->renameColumn('required', 'is_required');
            $table->dropColumn('default_value');
            $table->text('prompt')->nullable();
            $table->boolean('other_option')->default(false);
            $table->tinyInteger('max_files_count')->nullable();
            $table->string('file_allows')->nullable();
            $table->text('file_types')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_fields', function (Blueprint $table) {
            $table->renameColumn('is_required', 'required');
            $table->string('default_value')->nullable();
            $table->dropColumn([
                'prompt',
                'other_option',
                'max_files_count',
                'file_allows',
                'file_types',
            ]);
        });
    }
}
