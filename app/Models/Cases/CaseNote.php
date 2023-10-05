<?php

namespace App\Models\Cases;

use App\Http\Enumerators\Cases\CaseEventEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseNote extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'case_id', 'note', 'user_id'
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
     * update note
     *
     * @param string $value
     * @return void
     */
    public function UpdateNote($value)
    {
        $this->note = $value;
        $this->save();

        if($this->case) $this->case->RecordEvent(CaseEventEnum::EVENT_UPDATE_NOTE,$this->id);
    }
}
