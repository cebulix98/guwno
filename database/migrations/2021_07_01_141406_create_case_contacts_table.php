<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('case_contacts')) {
            Schema::create('case_contacts', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('case_id')->nullable()->unsigned()->comment('sprawa');
                $table->foreign('case_id')->references('id')->on('case_cases')->onDelete('cascade');

                $table->bigInteger('type_id')->nullable()->unsigned()->comment('typ kontaktu');
                $table->foreign('type_id')->references('id')->on('dictionary_contact_types');
    
                $table->string('data')->nullable()->comment('dane kontaktowe');
                
                $table->boolean('is_primary')->nullable()->comment('czy główny');
    
                $table->string('note')->nullable()->comment('opis');
                
                $table->timestamps();
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
        Schema::dropIfExists('case_contacts');
    }
}
