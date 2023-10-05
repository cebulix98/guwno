<?php

namespace App\Models\Cases;

use App\Http\Enumerators\Cases\CaseEventEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CasePerson extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'case_id', 'firstname', 'lastname', 'phone', 'email'
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
     * update name
     *
     * @param string $firstname
     * @param string $lastname
     * @return void
     */
    public function UpdateFullname($firstname, $lastname)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->save();

        if ($this->case) {
            $this->case->UpdateFullname($firstname, $lastname);
            $this->case->RecordEvent(CaseEventEnum::EVENT_UPDATE_PETITIONER_NAME, $firstname . ' ' . $lastname);
        }
    }

    /**
     * update firstname
     *
     * @param string $value
     * @return void
     */
    public function UpdateFirstname($value)
    {
        $this->firstname = $value;
        $this->save();
    }

    /**
     * update lastname
     *
     * @param string $value
     * @return void
     */
    public function UpdateLastname($value)
    {
        $this->lastname = $value;
        $this->save();
    }

    /**
     * update value
     *
     * @param string $value
     * @return void
     */
    public function UpdatePhone($value)
    {
        $this->phone = $value;
        $this->save();

        if ($this->case)
            $this->case->RecordEvent(CaseEventEnum::EVENT_UPDATE_PETITIONER_PHONE, $value);
    }

    /**
     * update value
     *
     * @param string $value
     * @return void
     */
    public function UpdateEmail($value)
    {
        $this->email = $value;
        $this->save();

        if ($this->case)
            $this->case->RecordEvent(CaseEventEnum::EVENT_UPDATE_PETITIONER_EMAIL, $value);
    }
}
