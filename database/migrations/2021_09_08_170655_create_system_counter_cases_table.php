<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemCounterCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('system_counter_cases')) {
            Schema::create('system_counter_cases', function (Blueprint $table) {
                $table->id();
                $table->string('code')->nullable()->comment('kod');

                $table->bigInteger('current_user_id')->nullable()->unsigned()->comment('id uzytkownika');
                $table->bigInteger('current_order')->nullable()->comment('kolejnosc');

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
        Schema::dropIfExists('system_counter_cases');
    }
}
