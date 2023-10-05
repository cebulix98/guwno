<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDictionaryWebAddColumnKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table_name = 'dictionary_webs';

        if (Schema::hasTable($table_name)) {
            if (!Schema::hasColumn($table_name, 'key')) {
                Schema::table($table_name, function (Blueprint $table) {
                    $table->string('key')->nullable()->comment('kod')->index()->unique();
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
