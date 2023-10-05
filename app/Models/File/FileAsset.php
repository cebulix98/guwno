<?php

namespace App\Models\File;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FileAsset extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'filename', 'directory_id'
    ];

    /**
     * relation: directory
     *
     * @return FileAssetDirectory
     */
    public function directory()
    {
        return $this->hasOne(FileAssetDirectory::class, 'id', 'directory_id');
    }
}
