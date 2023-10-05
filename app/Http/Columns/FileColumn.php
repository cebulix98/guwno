<?php

namespace App\Http\Columns;

use App\Models\File\FileAsset;
use App\Models\File\FileAssetDirectory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/** db model creator */
class FileColumn
{

    public const FILE_ASSETS = ['name', 'filename', 'directory_id', 'url'];
    public const FILE_ASSET_DIRECTORIES = ['name', 'path', 'code'];

    public static function CheckColumnFileAsset($attribute)
    {
        Schema::table('file_assets', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'name':
                    $table->string('name')->nullable()->comment('nazwa pliku')->index();
                    break;
                case 'filename':
                    $table->string('filename')->nullable()->comment('sciezka');
                    break;
                case 'directory_id':
                    $table->bigInteger('directory_id')->nullable()->unsigned()->comment('działu');
                    $table->foreign('directory_id')->references('id')->on('file_asset_directories')->onDelete('cascade');
                    break;
                case 'url':
                    $table->string('url')->nullable()->comment('url')->index();
                    break;
            }
        });
    }

    public static function CheckColumnFileAssetDirectory($attribute)
    {
        Schema::table('file_asset_directories', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'name':
                    $table->string('name')->nullable()->index();
                    break;
                case 'code':
                    $table->string('code')->nullable()->index();
                    break;
                case 'path':
                    $table->string('path')->nullable();
                    break;
            }
        });
    }
}
