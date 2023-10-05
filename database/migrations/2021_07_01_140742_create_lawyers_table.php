<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLawyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('lawyers')) {
            Schema::create('lawyers', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('user_id')->nullable()->unsigned()->comment('id uzytkownika');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->string('firstname')->nullable();
                $table->string('lastname')->nullable();
                $table->string('phone')->nullable();
                $table->string('email')->nullable();
                $table->integer('order')->nullable();
                $table->boolean('is_auto_assigned')->nullable();
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
        Schema::dropIfExists('lawyers');
    }
}
