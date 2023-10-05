<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDictionaryAgreementCaseTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('dictionary_agreement_case_types')) {
            Schema::create('dictionary_agreement_case_types', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('agreement_id')->nullable()->unsigned()->comment('id zgody');
                $table->foreign('agreement_id')->references('id')->on('dictionary_agreements')->onDelete('cascade');

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
        Schema::dropIfExists('dictionary_agreement_case_types');
    }
}
