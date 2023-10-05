<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPermissionModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('user_permission_modules')) {
            Schema::create('user_permission_modules', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable()->comment('nazwa')->index();
                $table->string('code')->nullable()->comment('kod')->index();
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
        Schema::dropIfExists('user_permission_modules');
    }
}
