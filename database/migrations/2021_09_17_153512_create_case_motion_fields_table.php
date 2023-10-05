<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseMotionFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('case_motion_fields')) {
            Schema::create('case_motion_fields', function (Blueprint $table) {
                $table->id();

                $table->bigInteger('case_id')->nullable()->unsigned()->comment('sprawa');
                $table->foreign('case_id')->references('id')->on('case_cases')->onDelete('cascade');

                $table->bigInteger('field_id')->nullable()->unsigned()->comment('pole');
                $table->foreign('field_id')->references('id')->on('motion_fields')->onDelete('cascade');

                $table->longText('data')->nullable()->comment('dane');
                $table->string('value')->nullable()->comment('wartość');

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
        Schema::dropIfExists('case_motion_fields');
    }
}
