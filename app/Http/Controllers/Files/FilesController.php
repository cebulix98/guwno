<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use App\Http\Creators\FileCreator;
use App\Models\File\FileAsset;
use App\Models\File\FileAssetDirectory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    /**
     * download file
     *
     * @param Request $request
     * @return void
     */
    public function DownloadFile(Request $request)
    {
        try {
            $file = FileAsset::find($request->id);
            $path = storage_path('app/public/' . $file->filename);
            return response()->download($path);
        } catch (Exception $e) {
            $success = false;
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.download_fail'));
        }

        return redirect()->back();
    }

    /**
     * upload file
     *
     * @param array $files
     * @param int $directory_id
     * @param string $path
     * @return FileAsset
     */
    public static function UploadFile($files, $directory_id, $path)
    {
        if (!is_array($files)) $files = array($files);
        $db_file = null;

        if (is_array($files)) {
            foreach ($files as $file) {
                try {
                    $name = strtolower($file->getClientOriginalName());
                    $filename = $file->store($path);
                    $db_file = FileCreator::CreateFileAsset($name, $filename, $directory_id);
                } catch (Exception $e) {
                    $filename = $file->store($path);
                    $db_file = FileCreator::CreateFileAsset($name, $filename, $directory_id);
                }
            }
        }

        return $db_file;
    }

        /**
     * upload file
     *
     * @param array $files
     * @param int $directory_id
     * @param string $path
     * @return FileAsset
     */
    public static function UploadFileGenerateNames($files, $directory_id, $path)
    {
        if (!is_array($files)) $files = array($files);
        $db_file = array();

        if (is_array($files)) {
            foreach ($files as $file) {
                try {
                    $name = strtolower($file->getClientOriginalName());
                    $filename = $file->store($path);
                    $db_file[] = FileCreator::CreateFileAsset($name, $filename, $directory_id);
                } catch (Exception $e) {
                   Log::error($e);
                }
            }
        }

        return $db_file;
    }

            /**
     * upload file
     *
     * @param array $files
     * @param int $directory_id
     * @param string $path
     * @return FileAsset
     */
    public static function UploadFileWithName($files, $directory_id, $path, $name)
    {
        if (!is_array($files)) $files = array($files);
        $db_file = array();

        if (is_array($files)) {
            foreach ($files as $file) {
                try {
                    $filename = $file->storeAs($path, $name);
                    $db_file[] = FileCreator::CreateFileAsset($name, $filename, $directory_id);
                } catch (Exception $e) {
                   Log::error($e);
                }
            }
        }

        return $db_file;
    }

        /**
     * upload file
     *
     * @param array $files
     * @param int $directory_id
     * @param string $path
     * @return FileAsset
     */
    public static function UploadFileOnlyName($files, $path)
    {
        if (!is_array($files)) $files = array($files);

        if (is_array($files)) {
            foreach ($files as $file) {
                try {
                    $name = strtolower($file->getClientOriginalName());
                    $filename = $file->storeAs($path, $name);
                    return $filename;
                } catch (Exception $e) {
                    $filename = $file->store($path);
                    return $filename;
                }
            }
        }

        return false;
    }

    /**
     * upload file with given directory code
     *
     * @param * $file
     * @param string $directory_code
     * @return FileAsset
     */
    public static function UploadFileWithDirectoryCode($file, $directory_code)
    {
        $directory = FileAssetDirectory::where('code', '=', $directory_code)->first();

        if ($directory != null) {
            $asset = FilesController::UploadFile($file, $directory->id, $directory->path);
            if ($asset != null) return $asset;
        }
    }

    /**
     * delete file
     *
     * @param Request $request
     * @return void
     */
    public function DeleteFile(Request $request)
    {
        try {
            $file = FileAsset::find($request->id);
            Storage::delete($file->filename);
            $file->delete();
            request()->session()->flash('alert-success', __('messages.delete_success'));
        } catch (Exception $e) {
            $success = false;
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.delete_fail'));
        }

        return redirect()->back();
    }
}
