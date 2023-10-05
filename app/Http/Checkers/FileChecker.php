<?php

namespace App\Http\Checkers;

use App\Http\Columns\FileColumn;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

/** db model creator */
class FileChecker
{
    public static function CheckFileAsset()
    {
        $table_name = 'file_assets';
        $cols = FileColumn::FILE_ASSETS;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    FileColumn::CheckColumnFileAsset($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
      
    }

    public static function CheckFileAssetDirectory()
    {
        $table_name = 'file_asset_directories';
        $cols = FileColumn::FILE_ASSET_DIRECTORIES;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    FileColumn::CheckColumnFileAssetDirectory($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
      
    }
}
