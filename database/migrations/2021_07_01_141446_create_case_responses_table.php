<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('case_responses')) {
            Schema::create('case_responses', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('case_id')->nullable()->unsigned()->comment('sprawa');
                $table->foreign('case_id')->references('id')->on('case_cases')->onDelete('cascade');
                
                $table->bigInteger('user_id')->nullable()->unsigned()->comment('id uzytkownika');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                
                $table->longText('content')->nullable()->comment('treść');
                $table->longText('footer')->nullable()->comment('stopka');

                $table->longText('note')->nullable()->comment('notatka');

                $table->date('date_sent')->nullable()->comment('data wysylki');
        
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
        Schema::dropIfExists('case_responses');
    }
}
