<?php

namespace App\Models\Cases;

use App\Models\File\FileAsset;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseResponseAttachement extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_id', 'file_id', 'response_id'
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
     * relation: response
     *
     * @return CaseResponse
     */
    public function response()
    {
        return $this->hasOne(CaseResponse::class, 'id', 'response_id');
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
