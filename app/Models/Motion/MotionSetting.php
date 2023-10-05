<?php

namespace App\Models\Motion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MotionSetting extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'motion_id', 'is_free', 'has_attachement', 'has_agreements', 'has_custom_form', 'custom_link'
    ];

    /**
     * relation: motion
     *
     * @return Motion
     */
    public function motion()
    {
        return $this->hasOne(Motion::class, 'id', 'motion_id');
    }

    /**
     * update attribute
     *
     * @param * $value
     * @return void
     */
    public function UpdateIsFree($value)
    {
        $this->is_free = $value;
        $this->save();
    }

    /**
     * update attribute
     *
     * @param * $value
     * @return void
     */
    public function UpdateHasAttachement($value)
    {
        $this->has_attachement = $value;
        $this->save();
    }

    /**
     * update attribute
     *
     * @param * $value
     * @return void
     */
    public function UpdateHasAgreements($value)
    {
        $this->has_agreements = $value;
        $this->save();
    }
}
