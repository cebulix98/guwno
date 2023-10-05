<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('case_cases')) {
            Schema::create('case_cases', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable()->comment('nazwa');
                $table->string('code')->nullable()->comment('kod');
                $table->bigInteger('motion_id')->nullable()->unsigned()->comment('wniosek');
                $table->foreign('motion_id')->references('id')->on('motions')->onDelete('cascade');

                $table->bigInteger('type_id')->nullable()->unsigned()->comment('typ');
                $table->foreign('type_id')->references('id')->on('dictionary_case_types')->onDelete('cascade');

                $table->bigInteger('status_id')->nullable()->unsigned()->comment('status');
                $table->foreign('status_id')->references('id')->on('dictionary_case_statuses');
                $table->string('status_code')->nullable()->comment('kod systemowy statusu');

                $table->bigInteger('origin_id')->nullable()->unsigned()->comment('web');
                $table->foreign('origin_id')->references('id')->on('dictionary_webs')->onDelete('cascade');

                $table->boolean('is_active')->nullable()->comment('czy aktywny');
                $table->boolean('is_completed')->nullable()->comment('czy zakończony');

                $table->string('firstname')->nullable();
                $table->string('lastname')->nullable();
                $table->date('date_started')->comment('data rozpoczecia')->nullable();
                $table->date('date_completed')->comment('data zakończenia')->nullable();
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
        Schema::dropIfExists('case_cases');
    }
}
