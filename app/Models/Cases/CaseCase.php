<?php

namespace App\Models\Cases;

use App\Http\Creators\CaseCreator;
use App\Http\Enumerators\Cases\CaseEventEnum;
use App\Http\Managers\CaseManager;
use App\Http\Traits\CommonModelTrait;
use App\Http\Traits\DictionaryReaderTrait;
use App\Models\Dictionary\DictionaryCaseStatus;
use App\Models\Dictionary\DictionaryCaseType;
use App\Models\Dictionary\DictionaryHistoryEvent;
use App\Models\Dictionary\DictionaryWeb;
use App\Models\Motion\Motion;
use App\Models\Order\Order;
use App\Models\System\SystemCounterCase;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * tabela case_cases
 */

/**
 * statusy:
 * 
 * 1 status_wait_assignment - oczekuje na przydzielenie
 * 2 status_wait_start - oczekuje na rozpoczecie
 * 3 status_started - rozpoczete
 * 4 status_ended - zakonczone 
 * 5 status_cancelled - anulowane
 * 
 */
class CaseCase extends Model
{
    use HasFactory, SoftDeletes, DictionaryReaderTrait, CommonModelTrait;

    protected $fillable = [
        'name', 'code', 'motion_id', 'status_id', 'status_code', 'is_active', 'is_completed', 'firstname', 'lastname', 'date_started', 'date_completed', 'type_id', 'origin_id'
    ];

    /**
     * relation: status
     *
     * @return DictionaryCaseStatus
     */
    public function status()
    {
        return $this->hasOne(DictionaryCaseStatus::class, 'id', 'status_id');
    }

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
     * relation: motion
     *
     * @return Motion
     */
    public function motion()
    {
        return $this->hasOne(Motion::class, 'id', 'motion_id');
    }

    /**
     * relation: motion
     *
     * @return Motion
     */
    public function case_motion()
    {
        return $this->hasOne(CaseMotion::class, 'case_id', 'id');
    }

    /**
     * relation: motion
     *
     * @return Motion
     */
    public function case_motion_versions()
    {
        return $this->hasMany(CaseMotionVersion::class, 'case_id', 'id');
    }

    /**
     * relation: DictionaryWeb
     *
     * @return DictionaryWeb
     */
    public function origin()
    {
        return $this->hasOne(DictionaryWeb::class, 'id', 'origin_id');
    }

    /**
     * relation: motion
     *
     * @return Motion
     */
    public function case_motion_fields()
    {
        return $this->hasMany(CaseMotionField::class, 'case_id', 'id');
    }

    /**
     * relation: order
     *
     * @return Order
     */
    public function order()
    {
        return $this->hasOne(Order::class, 'case_id', 'id');
    }

        /**
     * relation: petitioner
     *
     * @return CasePerson
     */
    public function petitioner()
    {
        return $this->hasOne(CasePerson::class, 'case_id', 'id');
    }

    /**
     * relation: contacts
     *
     * @return CaseContact
     */
    public function contacts()
    {
        return $this->hasMany(CaseContact::class, 'case_id', 'id');
    }

    /**
     * relation: attachements
     *
     * @return CaseAttachement
     */
    public function attachements()
    {
        return $this->hasMany(CaseAttachement::class, 'case_id', 'id');
    }

    /**
     * relation: history
     *
     * @return CaseHistory
     */
    public function history()
    {
        return $this->hasMany(CaseHistory::class, 'case_id', 'id')->orderByDesc('created_at');
    }

    /**
     * relation: lawyers
     *
     * @return CaseLawyer
     */
    public function lawyers()
    {
        return $this->hasMany(CaseLawyer::class, 'case_id', 'id');
    }

    /**
     * relation: users
     *
     * @return CaseLawyer
     */
    public function users()
    {
        return $this->hasManyThrough(User::class, CaseLawyer::class, 'case_id', 'id', 'id', 'user_id');
    }

    /**
     * relation: notes
     *
     * @return CaseNote
     */
    public function notes()
    {
        return $this->hasMany(CaseNote::class, 'case_id', 'id');
    }

    /**
     * relation: responses
     *
     * @return CaseResponse
     */
    public function responses()
    {
        return $this->hasMany(CaseResponse::class, 'case_id', 'id');
    }

    public function GetPrimaryLawyer()
    {
        return $this->lawyers->where('is_primary', true)->first();
    }



    /**
     * search 
     *
     * @param [type] $query
     * @param string $keywords
     * @return void
     */
    public function scopeSearch($query, $keywords)
    {
        return $query->where('name', 'LIKE', '%' . $keywords . '%')->orWhere('code', 'LIKE', '%' . $keywords . '%');
    }

    /**
     * generate code
     *
     * @return void
     */
    public function GenerateCode()
    {
        $code = Carbon::now()->format('Ymd') . $this->id;
        $this->code = $code;
        $this->save();
    }

    /**
     * generate name
     *
     * @return void
     */
    public function GenerateName()
    {
        $suffix = Carbon::now()->format('Ymd') . '/' . $this->id;
        $name = ($this->motion) ? $this->motion->id . '/' . $suffix : $suffix;
        $this->name = $name;
        $this->save();
    }

    //UPDATE

    /**
     * update attribute
     *
     * @param string $value
     * @return void
     */
    public function UpdateName($value)
    {
        $this->name = $value;
        $this->RecordEvent(CaseEventEnum::EVENT_UPDATE_CASE_NAME);
        $this->save();
    }

    /**
     * set next status
     *
     * @return void
     */
    public function SetNextStatus()
    {
        switch ($this->status_code) {
            case 'status_wait_assignment':
                $this->UpdateStatus('status_wait_start');
                break;
            case 'status_wait_start':
                $this->UpdateStatus('status_started');
                break;
            case 'status_started':
                $this->UpdateStatus('status_ended');
                break;
            case 'status_ended':
                break;
            case 'status_cancelled':
                break;
        }
    }

    /**
     * find dictionary status by code
     *
     * @param string $code
     * @see config/variables/dictionary
     * @return DictionaryCaseStatus
     */
    public function FindStatusByCode($code)
    {
        return DictionaryCaseStatus::where('code', $code)->first();
    }

    /**
     * update status
     *
     * @param string $code
     * @see config/variables/dictionary
     * @return void
     */
    public function UpdateStatus($code)
    {
        $dic_status = $this->FindStatusByCode($code);

        if ($dic_status != null) {
            $this->status_id = $dic_status->id;
            $this->status_code = $dic_status->code;
            $this->save();

            $this->RecordEvent(CaseEventEnum::EVENT_CHANGE_STATUS, $dic_status->name);
        }
    }

    /**
     * start
     *
     * @return void
     */
    public function Start()
    {
        $this->UpdateStatus('status_started');
        $this->date_started = Carbon::now();
        $this->save();

        $this->RecordEvent(CaseEventEnum::EVENT_START);
    }

    /**
     * complete
     *
     * @return void
     */
    public function Complete()
    {
        $this->UpdateStatus('status_ended');
        $this->is_completed = true;
        $this->date_completed = Carbon::now();
        $this->save();

        $this->RecordEvent(CaseEventEnum::EVENT_END);
    }

    /**
     * verify
     *
     * @return void
     */
    public function Verify()
    {
        $this->UpdateStatus('status_wait_start');
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

        $this->RecordEvent(CaseEventEnum::EVENT_UPDATE_PETITIONER_NAME, $firstname . ' ' . $lastname);
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
     * update origin
     *
     * @param string $value
     * @return void
     */
    public function UpdateOrigin($value)
    {
        $this->origin_id = $value;
        $this->save();
    }

    /**
     * update motion
     *
     * @param string $value
     * @return void
     */
    public function UpdateMotion($value)
    {
        $this->motion = $value;
        $this->save();
    }

    /**
     * record history event
     *
     * @param string $code
     * @return CaseHistory
     */
    public function RecordEvent($code, $comment = null)
    {
        $event = DictionaryHistoryEvent::where('code', $code)->first();

        if ($event) {
            $name = $event->name . ' ' . $comment;
            $record = CaseCreator::CreateCaseHistory($this->id, $event->code, $name, Auth::id(), $event->id);
            return $record;
        }
    }

    /**
     * auto assign lawyer
     *
     * @return void
     */
    public function AutoAssignLawyer()
    {
        $counter = SystemCounterCase::where('code', 'case_auto')->first();
        $user = $counter->GetNextAssignement();

        if ($user) {
            CaseManager::CreateCaseLawyer($this->id, $user->id);
        }
    }

    /**
     * change status
     *
     * @return void
     */
    public function Assign()
    {
        if ($this->status_code == "status_wait_assignment") $this->SetNextStatus();
    }
}
