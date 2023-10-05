<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseMotionVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('case_motion_versions')) {
            Schema::create('case_motion_versions', function (Blueprint $table) {
                $table->id();

                $table->bigInteger('case_id')->nullable()->unsigned()->comment('sprawa');
                $table->foreign('case_id')->references('id')->on('case_cases')->onDelete('cascade');

                $table->bigInteger('file_id')->nullable()->unsigned()->comment('id pliku');
                $table->foreign('file_id')->references('id')->on('file_assets');

                $table->bigInteger('type_id')->nullable()->unsigned()->comment('1-rtf, 2-pdf, 3-txt');

                $table->string('version')->nullable()->comment('wersja');

                $table->boolean('is_primary')->nullable()->comment('glowna/najnowsza');

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
        Schema::dropIfExists('case_motion_versions');
    }
}
