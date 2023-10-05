<?php

namespace App\Models\Motion;

use App\Models\Dictionary\DictionaryAgreement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotionAgreement extends Model
{
    use HasFactory;

    protected $fillable = [
        'motion_id', 'is_required', 'is_active'
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
     * relation: agreement
     *
     * @return DictionaryAgreement
     */
    public function agreement()
    {
        return $this->hasOne(DictionaryAgreement::class, 'id', 'agreement_id');
    }

      /**
     * Update name
     *
     * @param string $name
     * @return void
     */
    public function UpdateAgreement($value)
    {
        $this->agreement_id = $value;
        $this->save();
    }

    /**
     * toggle active
     *
     * @param boolean $toggle
     * @return void
     */
    public function ToggleIsRequired($toggle)
    {
        $this->is_required = $toggle;
        $this->save();
    }


}
