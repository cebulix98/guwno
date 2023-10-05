<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLawyerContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('lawyer_contacts')) {
            Schema::create('lawyer_contacts', function (Blueprint $table) {
                $table->id();

                $table->bigInteger('lawyer_id')->nullable()->unsigned()->comment('prawnik');
                $table->foreign('lawyer_id')->references('id')->on('lawyers')->onDelete('cascade');

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
        Schema::dropIfExists('lawyer_contacts');
    }
}
