<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSettingOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('user_setting_options')) {
            Schema::create('user_setting_options', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('category_id')->nullable()->unsigned()->comment('id kategorii');
                $table->foreign('category_id')->references('id')->on('user_setting_categories')->onDelete('cascade');
                $table->string('name')->nullable()->comment('nazwa')->index();
                $table->string('code')->nullable()->comment('kod')->index();
                $table->string('default')->nullable()->comment('domyślna wartość');
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
        Schema::dropIfExists('user_setting_options');
    }
}
