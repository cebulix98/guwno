<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseResponseAttachementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('case_response_attachements')) {
            Schema::create('case_response_attachements', function (Blueprint $table) {
                $table->id();

                $table->bigInteger('case_id')->nullable()->unsigned()->comment('sprawa');
                $table->foreign('case_id')->references('id')->on('case_cases')->onDelete('cascade');

                $table->bigInteger('response_id')->nullable()->unsigned()->comment('odpowiedz');
                $table->foreign('response_id')->references('id')->on('case_responses')->onDelete('cascade');

                $table->bigInteger('file_id')->nullable()->unsigned()->comment('id pliku');
                $table->foreign('file_id')->references('id')->on('file_assets');

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
        Schema::dropIfExists('case_response_attachements');
    }
}
