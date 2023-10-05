<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotionFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('motion_fields')) {
            Schema::create('motion_fields', function (Blueprint $table) {
                $table->id();

                $table->string('code')->nullable()->comment('kod');
                $table->string('type')->nullable()->comment('typ');
                $table->string('name')->nullable()->comment('nazwa');
                $table->string('name_lang')->nullable()->comment('zmienna językowa');

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
        Schema::dropIfExists('motion_fields');
    }
}
