<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseMotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('case_motions')) {
            Schema::create('case_motions', function (Blueprint $table) {
                $table->id();

                $table->string('code')->nullable()->comment('kod')->index();

                $table->bigInteger('case_id')->nullable()->unsigned()->comment('sprawa');
                $table->foreign('case_id')->references('id')->on('case_cases')->onDelete('cascade');

                $table->bigInteger('rtf_id')->nullable()->unsigned()->comment('id pliku');
                $table->foreign('rtf_id')->references('id')->on('file_assets');

                $table->bigInteger('pdf_id')->nullable()->unsigned()->comment('id pliku');
                $table->foreign('pdf_id')->references('id')->on('file_assets');

                $table->bigInteger('txt_id')->nullable()->unsigned()->comment('id pliku');
                $table->foreign('txt_id')->references('id')->on('file_assets');

                $table->bigInteger('original_rtf_id')->nullable()->unsigned()->comment('id pliku');
                $table->foreign('original_rtf_id')->references('id')->on('file_assets');

                $table->bigInteger('original_pdf_id')->nullable()->unsigned()->comment('id pliku');
                $table->foreign('original_pdf_id')->references('id')->on('file_assets');

                $table->bigInteger('original_txt_id')->nullable()->unsigned()->comment('id pliku');
                $table->foreign('original_txt_id')->references('id')->on('file_assets');

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
        Schema::dropIfExists('case_motions');
    }
}
