<?php

namespace App\Models\Cases;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseHistory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'case_id', 'code', 'name', 'user_id', 'event_id'
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
     * relation: user
     *
     * @return User
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
