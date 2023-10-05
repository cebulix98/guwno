<?php

namespace App\Http\Creators;

use App\Http\Enumerators\Cases\CaseEventEnum;
use App\Models\Cases\CaseAttachement;
use App\Models\Cases\CaseCase;
use App\Models\Cases\CaseContact;
use App\Models\Cases\CaseHistory;
use App\Models\Cases\CaseLawyer;
use App\Models\Cases\CaseMotion;
use App\Models\Cases\CaseMotionField;
use App\Models\Cases\CaseMotionVersion;
use App\Models\Cases\CaseNote;
use App\Models\Cases\CasePerson;
use App\Models\Cases\CaseResponse;
use App\Models\Cases\CaseResponseAttachement;

/** db model creator */
class CaseCreator
{
    /**
     * create model
     *
     * @param int $motion_id
     * @param string $firstname
     * @param string $lastname
     * @return CaseCase
     */
    public static function CreateCaseCase($motion_id, $firstname, $lastname, $type_id)
    {
        $model = CaseCase::create([
            'motion_id' => $motion_id,
            'status_id' => 1,
            'status_code' => 'status_wait_assignment',
            'is_active' => true,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'type_id' => $type_id
        ]);

        $model->GenerateCode();
        $model->GenerateName();
        $model->RecordEvent(CaseEventEnum::EVENT_CREATED);

        return $model;
    }

    /**
     * create model
     *
     * @param int $case_id
     * @param int $file_id
     * @param string $url
     * @return CaseAttachement
     */
    public static function CreateCaseAttachement($case_id, $file_id, $url, $description=null)
    {
        $model = CaseAttachement::create([
            'case_id' => $case_id,
            'file_id' => $file_id,
            'url' => $url,
            'description' => $description
        ]);

        return $model;
    }

    /**
     * create model
     *
     * @param int $case_id
     * @param int $type_id
     * @param string $data
     * @param boolean $is_primary
     * @param string $note
     * @return CaseContact
     */
    public static function CreateCaseContact($case_id, $type_id, $data, $is_primary, $note = null)
    {
        $model = CaseContact::create([
            'case_id' => $case_id,
            'type_id' => $type_id,
            'data' => $data,
            'is_primary' => $is_primary,
            'note' => $note
        ]);

        return $model;
    }

    /**
     * create model
     *
     * @param int $case_id
     * @param string $code
     * @param string $name
     * @return CaseHistory
     */
    public static function CreateCaseHistory($case_id, $code, $name, $user_id, $event_id)
    {
        $model = CaseHistory::create([
            'case_id' => $case_id,
            'code' => $code,
            'name' => $name,
            'user_id' => $user_id,
            'event_id' => $event_id
        ]);

        return $model;
    }

    /**
     * create model
     *
     * @param int $case_id
     * @param int $user_id
     * @return CaseLawyer
     */
    public static function CreateCaseLawyer($case_id, $user_id, $is_primary)
    {
        $model = CaseLawyer::create([
            'case_id' => $case_id,
            'user_id' => $user_id,
            'is_active' => true,
            'is_primary' => $is_primary
        ]);

        $model->case->RecordEvent(CaseEventEnum::EVENT_ADD_LAWYER);

        return $model;
    }

    /**
     * create model
     *
     * @param int $case_id
     * @param string $note
     * @return CaseNote
     */
    public static function CreateCaseNote($case_id, $note, $user_id)
    {
        $model = CaseNote::create([
            'case_id' => $case_id,
            'note' => $note,
            'user_id' => $user_id,
        ]);

        $model->case->RecordEvent(CaseEventEnum::EVENT_ADD_NOTE);

        return $model;
    }

    /**
     * create model
     *
     * @param int $case_id
     * @param string $note
     * @return CaseResponse
     */
    public static function CreateCaseResponse($case_id, $user_id, $content, $note = null, $footer=null)
    {
        $model = CaseResponse::create([
            'case_id' => $case_id,
            'note' => $note,
            'user_id' => $user_id,
            'content' => $content,
            'footer' => $footer
        ]);

        $model->case->RecordEvent(CaseEventEnum::EVENT_ADD_RESPONSE);

        return $model;
    }

    /**
     * create model
     *
     * @param int $case_id
     * @param string $note
     * @return CaseResponse
     */
    public static function CreateCaseResponseAttachement($case_id, $file_id, $response_id)
    {
        $model = CaseResponseAttachement::create([
            'case_id' => $case_id,
            'file_id' => $file_id,
            'response_id' => $response_id
        ]);

        return $model;
    }

    /**
     * create model
     *
     * @param int $case_id
     * @param string $firstname
     * @param string $lastname
     * @param string $phone
     * @param string $email
     * @return CasePerson
     */
    public static function CreateCasePerson($case_id, $firstname, $lastname, $phone, $email)
    {
        $model = CasePerson::create([
            'case_id' => $case_id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'phone' => $phone,
            'email' => $email
        ]);

        return $model;
    }

    /**
     * create model
     *
     * @param int $case_id
     * @return CaseMotion
     */
    public static function CreateCaseMotion($case_id)
    {
        $model = CaseMotion::create([
            'case_id' => $case_id,
        ]);

        $model->GenerateCode();

        return $model;
    }

    /**
     * create model
     *
     * @param int $case_id
     * @param string $field
     * @param string $data
     * @return CaseMotionField
     */
    public static function CreateCaseMotionField($case_id, $field, $data)
    {
        $model = CaseMotionField::create([
            'case_id' => $case_id,
            'field_id' => $field,
            'data' => $data
        ]);

        return $model;
    }

    /**
     * create model
     *
     * @param int $case_id
     * @param int $type_id
     * @param int $file_id
     * @param string $version
     * @param boolean $is_primary
     * @return CaseMotionVersion
     */
    public static function CreateCaseMotionVersion($case_id, $type_id, $file_id, $version, $is_primary)
    {
        $model = CaseMotionVersion::create([
            'case_id' => $case_id,
            'type_id' => $type_id,
            'file_id' => $file_id,
            'version' => $version,
            'is_primary' => $is_primary
        ]);

        return $model;
    }
}
