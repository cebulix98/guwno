<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemResponseFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('system_response_footers')) {
            Schema::create('system_response_footers', function (Blueprint $table) {
                $table->id();
                $table->string('code')->nullable()->comment('kod');
                $table->longText('content')->nullable()->comment('stopka');
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
        Schema::dropIfExists('system_response_footers');
    }
}
