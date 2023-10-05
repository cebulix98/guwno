<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDictionaryStatusTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('dictionary_status_types')) {
            Schema::create('dictionary_status_types', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable()->comment('tresc')->index();
                $table->string('code')->nullable()->comment('kod')->index();
                $table->string('name_lang')->nullable()->comment('zmienna językowa');
                $table->boolean('can_edit')->nullable()->comment('czy mozna edytowac');
                $table->boolean('can_remove')->nullable()->comment('czy mozna usunac');
                $table->boolean('is_programmed')->nullable()->comment('info: czy jest zaprogramowany/robi coś w programie. Zmienienie tego na tak nic nie da');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dictionary_status_types');
    }
}
