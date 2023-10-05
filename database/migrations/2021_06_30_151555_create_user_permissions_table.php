<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('user_permissions')) {
            Schema::create('user_permissions', function (Blueprint $table) {
                $table->id();
                $table->bigInteger('user_id')->nullable()->unsigned()->comment('id uzytkownika');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

                $table->bigInteger('module_id')->nullable()->unsigned()->comment('id modułu');
                $table->foreign('module_id')->references('id')->on('user_permission_modules')->onDelete('cascade');

                $table->boolean('can_read')->nullable()->comment('moze widziec');
                $table->boolean('can_add')->nullable()->comment('moze dodawac');
                $table->boolean('can_edit')->nullable()->comment('moze edytowac');
                $table->boolean('can_delete')->nullable()->comment('moze usuwac');
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
        Schema::dropIfExists('user_permissions');
    }
}
