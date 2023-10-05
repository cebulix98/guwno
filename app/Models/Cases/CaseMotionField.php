<?php

namespace App\Models\Cases;

use App\Models\Motion\MotionField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseMotionField extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_id', 'field_id', 'data', 'value'
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
     * relation: field
     *
     * @return MotionField
     */
    public function field()
    {
        return $this->hasOne(MotionField::class, 'id', 'field_id');
    }
}
