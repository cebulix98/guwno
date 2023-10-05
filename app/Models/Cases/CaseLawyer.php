<?php

namespace App\Models\Cases;

use App\Http\Enumerators\Cases\CaseEventEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseLawyer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'case_id', 'user_id', 'is_active', 'is_primary'
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

    /**
     * toggle active
     *
     * @param boolean $toggle
     * @return void
     */
    public function ToggleActive($toggle)
    {
        $this->is_active = $toggle;
        $this->save();
    }

    public function UpdateUser($id) {
        $previous = ($this->user) ? $this->user->name : "";
        $this->user_id = $id;
        $this->save();
        $this->refresh();
        $current = ($this->user) ? $this->user->name : "";

        if($this->case) $this->case->RecordEvent(CaseEventEnum::EVENT_REASSIGN_LAWYER,$previous.' -> '.$current);
    }
}
