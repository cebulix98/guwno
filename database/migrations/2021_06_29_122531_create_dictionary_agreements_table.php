<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDictionaryAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('dictionary_agreements')) {
            Schema::create('dictionary_agreements', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable()->comment('tresc')->index();
                $table->string('code')->nullable()->comment('kod')->index();
                $table->string('name_lang')->nullable()->comment('zmienna językowa');
                $table->longText('description')->nullable()->comment('opis')->index();
                $table->boolean('is_active')->nullable()->comment('aktywne');
                $table->boolean('is_required')->nullable()->comment('obowiazkowe');
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
        Schema::dropIfExists('dictionary_agreements');
    }
}
