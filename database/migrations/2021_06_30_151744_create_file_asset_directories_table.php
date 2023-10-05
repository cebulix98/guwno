<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileAssetDirectoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('file_asset_directories')) {
            Schema::create('file_asset_directories', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable()->index();
                $table->string('code')->nullable()->index();
                $table->string('path')->nullable();
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
        Schema::dropIfExists('file_asset_directories');
    }
}
