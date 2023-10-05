<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDictionaryContactTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('dictionary_contact_types')) {
            Schema::create('dictionary_contact_types', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable()->comment('tresc')->index();
                $table->bigInteger('category_id')->nullable()->unsigned()->comment('rodzaj typu');
                $table->foreign('category_id')->references('id')->on('dictionary_contact_categories')->onDelete('cascade');
                $table->string('code')->nullable()->comment('kod')->index();
                $table->string('name_lang')->nullable()->comment('zmienna językowa');
                $table->string('icon')->nullable()->comment('ikona');
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
        Schema::dropIfExists('dictionary_contact_types');
    }
}
