<?php

namespace App\Models\File;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FileAssetDirectory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'path', 'code'
    ];

    /**
     * relation: files
     *
     * @return FileAsset
     */
    public function files()
    {
        return $this->hasMany(FileAsset::class, 'directory_id', 'id');
    }
}
