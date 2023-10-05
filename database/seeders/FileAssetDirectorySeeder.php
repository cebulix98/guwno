<?php

namespace Database\Seeders;

use App\Models\File\FileAssetDirectory;
use Illuminate\Database\Seeder;

class FileAssetDirectorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = config('variables.seeds.directories.file_asset_directory');

        foreach ($objects as $obj) {
            $exists = FileAssetDirectory::where('code',$obj['code'])->first();
            if(!$exists) FileAssetDirectory::factory()->create($obj);
        }
    }
}
