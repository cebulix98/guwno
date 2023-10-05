<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('user_settings')) {
            Schema::create('user_settings', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('user_id')->nullable()->unsigned()->comment('id uzytkownika');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                
                $table->bigInteger('option_id')->nullable()->unsigned()->comment('id opcji');
                $table->foreign('option_id')->references('id')->on('user_setting_options')->onDelete('cascade');
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
        Schema::dropIfExists('user_settings');
    }
}
