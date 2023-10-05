<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDictionaryWebsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('dictionary_webs')) {
            Schema::create('dictionary_webs', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable()->comment('tresc')->index();
                $table->string('code')->nullable()->comment('kod')->index();
                $table->bigInteger('smtp_id')->nullable()->unsigned();
                $table->foreign('smtp_id')->references('id')->on('config_smtps');
                $table->string('url')->nullable()->comment('url')->index();
                $table->string('name_lang')->nullable()->comment('zmienna językowa');
                $table->boolean('can_edit')->nullable()->comment('czy mozna edytowac');
                $table->boolean('can_remove')->nullable()->comment('czy mozna usunac');
                $table->boolean('is_active')->nullable()->comment('czy aktywne');
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
        Schema::dropIfExists('dictionary_webs');
    }
}
