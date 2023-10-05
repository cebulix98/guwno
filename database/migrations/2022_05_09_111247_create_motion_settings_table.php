<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotionSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('motion_settings')) {
            Schema::create('motion_settings', function (Blueprint $table) {
                $table->id();

                $table->bigInteger('motion_id')->nullable()->unsigned()->comment('wniosek');
                $table->foreign('motion_id')->references('id')->on('motions')->onDelete('cascade');

                $table->boolean('is_free')->nullable()->comment('czy platne');
                $table->boolean('has_attachement')->nullable()->comment('czy ma zalaczniki');
                $table->boolean('has_agreements')->nullable()->comment('czy ma zgody');
                $table->boolean('has_custom_form')->nullable()->comment('ma wlasny formularz');
                $table->string('custom_link')->nullable()->comment('wlasny link');
                
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
        Schema::dropIfExists('motion_settings');
    }
}
