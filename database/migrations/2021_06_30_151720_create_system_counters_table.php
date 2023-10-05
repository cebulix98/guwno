<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemCountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('system_counters')) {
            Schema::create('system_counters', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable()->comment('nazwa');
                $table->string('description')->nullable()->comment('za co');
                $table->bigInteger('count')->nullable()->comment('licznik');
                $table->bigInteger('count_default')->nullable()->comment('licznik domyslny');
                $table->string('next_number')->nullable()->comment('nastepny numer');
                $table->string('default_number')->nullable()->comment('numer domyslny (numer dla 1 tranzakcji w roku)');
                $table->string('number_prefix')->nullable()->comment('przedrostek do numeru');
                $table->string('year')->nullable()->comment('obecny rok');
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
        Schema::dropIfExists('system_counters');
    }
}
