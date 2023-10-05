<?php

namespace App\Models\Motion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Motion extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'can_edit', 'can_remove', 'code', 'name_lang', 'type_id'
    ];

    public const CODE_PREFIX = "motion_";

    /**
     * relation: type
     *
     * @return DictionaryCaseType
     */
    public function type()
    {
        return $this->hasOne(DictionaryCaseType::class, 'id', 'type_id');
    }

    /**
     * relation: settings
     *
     * @return MotionSetting
     */
    public function settings()
    {
        return $this->hasOne(MotionSetting::class, 'motion_id', 'id');
    }

    /**
     * relation: agreements
     *
     * @return MotionAgreement
     */
    public function agreements()
    {
        return $this->hasMany(MotionAgreement::class, 'motion_id', 'id');
    }

    /**
     * generate code
     *
     * @return void
     */
    public function GenerateCode()
    {
        $code = $this::CODE_PREFIX . $this->id;
        $this->code = $code;
        $this->save();
    }

    /**
     * copy lang name as name
     *
     * @return void
     */
    public function GenerateNameLang()
    {
        $this->name_lang = $this->name;
        $this->save();
    }

    /**
     * Update name
     *
     * @param string $name
     * @return void
     */
    public function UpdateName($name)
    {
        $this->name = $name;
        $this->save();
    }

    /**
     * can model be edited
     *
     * @return boolean
     */
    public function CanBeEdited()
    {
        if ($this->can_edit) return true;

        return false;
    }

    /**
     * can model be removed
     *
     * @return boolean
     */
    public function CanBeRemoved()
    {
        if ($this->can_remove) return true;

        return false;
    }

    public function GetPdfSchemaPath()
    {
        return 'pdf/motions/pdf_motion_' . $this->id;
    }

    public function GetRtfSchemaPath()
    {
        return 'rtf/motions/rtf_motion_' . $this->id;
    }
}
