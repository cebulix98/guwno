<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDictionariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('dictionaries')) {
            Schema::create('dictionaries', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable()->comment('nazwa');
                $table->string('code')->nullable()->comment('kod');
                $table->string('table_name')->nullable()->comment('tabela');
                $table->string('name_lang')->nullable()->comment('zmienna językowa');
                $table->boolean('is_editable')->nullable()->comment('slownik edytowalny');
                $table->boolean('is_visible')->nullable()->comment('widzialny na liscie slownikow');
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
        Schema::dropIfExists('dictionaries');
    }
}
