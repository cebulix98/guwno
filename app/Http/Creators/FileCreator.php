<?php

namespace App\Http\Creators;

use App\Models\File\FileAsset;
use App\Models\File\FileAssetDirectory;

/** db model creator */
class FileCreator
{
    /**
     * create FileAsset
     *
     * @param string $name
     * @param string $filename
     * @param int $directory_id
     * @return FileAsset
     */
    public static function CreateFileAsset($name, $filename, $directory_id)
    {
        $model = FileAsset::create([
            'name' => $name,
            'filename' => $filename,
            'directory_id' => $directory_id
        ]);

        return $model;
    }

    /**
     * create FileAssetDirectory
     *
     * @param string $name
     * @param string $path
     * @return FileAssetDirectory
     */
    public static function CreateFileAssetDirectory($name, $path)
    {
        $model = FileAssetDirectory::create([
            'name' => $name,
            'path' => $path
        ]);

        return $model;
    }
}
