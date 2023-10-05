<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDictionaryCaseStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('dictionary_case_statuses')) {
            Schema::create('dictionary_case_statuses', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable()->comment('tresc')->index();
                $table->string('code')->nullable()->comment('kod')->index();
                $table->string('name_lang')->nullable()->comment('zmienna językowa');
                $table->boolean('can_edit')->nullable()->comment('czy mozna edytowac');
                $table->boolean('can_remove')->nullable()->comment('czy mozna usunac');
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
        Schema::dropIfExists('dictionary_case_statuses');
    }
}
