<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSettingDefaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('user_setting_defaults')) {
            Schema::create('user_setting_defaults', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('option_id')->nullable()->unsigned()->comment('id opcji');
                $table->foreign('option_id')->references('id')->on('user_setting_options')->onDelete('cascade');
                $table->string('value')->nullable()->comment('domyślna wartość');
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
        Schema::dropIfExists('user_setting_defaults');
    }
}
