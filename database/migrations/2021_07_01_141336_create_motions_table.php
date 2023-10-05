<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('motions')) {
            Schema::create('motions', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable()->comment('tresc')->index();
                $table->string('code')->nullable()->comment('kod')->index();
                $table->bigInteger('type_id')->nullable()->unsigned()->comment('typ');
                $table->foreign('type_id')->references('id')->on('dictionary_case_types')->onDelete('cascade');
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
        Schema::dropIfExists('motions');
    }
}
