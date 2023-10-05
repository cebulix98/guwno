<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserResponseFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('user_response_footers')) {
            Schema::create('user_response_footers', function (Blueprint $table) {
                $table->id();
                $table->string('code')->nullable()->comment('kod');
                $table->longText('content')->nullable()->comment('stopka');
                $table->bigInteger('user_id')->nullable()->unsigned()->comment('id uzytkownika');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->boolean('is_primary')->nullable()->comment('glowna');
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
        Schema::dropIfExists('user_response_footers');
    }
}
