<?php

namespace App\Models\Cases;

use App\Models\File\FileAsset;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseAttachement extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_id', 'file_id', 'url', 'description', 'note'
    ];

    /**
     * relation: case
     *
     * @return CaseCase
     */
    public function case()
    {
        return $this->hasOne(CaseCase::class, 'id', 'case_id');
    }

    /**
     * relation: file
     *
     * @return FileAsset
     */
    public function file()
    {
        return $this->hasOne(FileAsset::class, 'id', 'file_id');
    }
}
