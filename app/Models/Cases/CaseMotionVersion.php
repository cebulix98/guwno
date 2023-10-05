<?php

namespace App\Models\Cases;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseMotionVersion extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'case_id', 'type_id', 'file_id', 'version', 'is_primary'
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

    /**
     * update attribute
     *
     * @param string $value
     * @return void
     */
    public function UpdateFile($value)
    {
        $this->file_id = $value;
        $this->save();
    }

    /**
     * update attribute
     *
     * @param string $value
     * @return void
     */
    public function UpdateVersion($value)
    {
        $this->version = $value;
        $this->save();
    }

    /**
     * toggle primary
     *
     * @param boolean $toggle
     * @return void
     */
    public function TogglePrimary($toggle)
    {
        $this->is_primary = $toggle;
        $this->save();
    }
}
