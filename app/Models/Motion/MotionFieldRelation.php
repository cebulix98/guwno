<?php

namespace App\Models\Motion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotionFieldRelation extends Model
{
    use HasFactory;

    protected $fillable = [
        'motion_id', 'field_id'
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
     * relation: field
     *
     * @return MotionField
     */
    public function field()
    {
        return $this->hasOne(MotionField::class, 'id', 'field_id');
    }
}
