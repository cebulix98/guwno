<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('file_assets')) {
            Schema::create('file_assets', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable()->comment('nazwa pliku')->index();
                $table->string('filename')->nullable()->comment('sciezka');
                $table->bigInteger('directory_id')->nullable()->unsigned()->comment('działu');
                $table->foreign('directory_id')->references('id')->on('file_asset_directories')->onDelete('cascade');
                $table->string('url')->nullable()->comment('url')->index();
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
        Schema::dropIfExists('file_assets');
    }
}
