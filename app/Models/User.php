<?php

namespace App\Models;

use App\Http\Creators\LawyerCreator;
use App\Http\Traits\StringOperationsTrait;
use App\Http\Updators\UserUpdator;
use App\Models\Cases\CaseCase;
use App\Models\Cases\CaseLawyer;
use App\Models\Lawyer\Lawyer;
use App\Models\User\LawyerStatsTrait;
use App\Models\User\Permission\UserPermission;
use App\Models\User\Permission\UserPermissionRole;
use App\Models\User\Setting\UserSetting;
use App\Models\User\UserNote;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, StringOperationsTrait, SoftDeletes, LawyerStatsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'firstname', 'lastname', 'role_id', 'phone', 'code', 'initials',
        'is_auto_assigned'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * relation: permissions
     *
     * @return UserPermission
     */
    public function permissions()
    {
        return $this->hasMany(UserPermission::class, 'user_id', 'id');
    }

    /**
     * relation: role
     *
     * @return UserPermissionRole
     */
    public function role()
    {
        return $this->hasOne(UserPermissionRole::class, 'id', 'role_id');
    }

    /**
     * relation: note
     *
     * @return UserNote
     */
    public function note()
    {
        return $this->hasOne(UserNote::class, 'user_id', 'id');
    }

    /**
     * relation: settings
     *
     * @return UserSetting
     */
    public function settings()
    {
        return $this->hasMany(UserSetting::class, 'user_id', 'id');
    }

    /**
     * relation: role
     *
     * @return UserPermissionRole
     */
    public function lawyer()
    {
        return $this->hasOne(Lawyer::class, 'user_id', 'id');
    }

    /**
     * relation: cases
     *
     * @return CaseCase
     */
    public function cases()
    {
        return $this->hasManyThrough(CaseCase::class, CaseLawyer::class, 'user_id', 'id', 'id', 'case_id');
    }

    /**
     * relation: cases
     *
     * @return CaseCase
     */
    public function cases_with_trashed()
    {
        return $this->hasManyThrough(CaseCase::class, CaseLawyer::class, 'user_id', 'id', 'id', 'case_id')->withTrashed();
    }

    /**
     * relation: cases
     *
     * @return CaseCase
     */
    public function cases_only_trashed()
    {
        return $this->hasManyThrough(CaseCase::class, CaseLawyer::class, 'user_id', 'id', 'id', 'case_id')->onlyTrashed();
    }

    /**
     * search 
     *
     * 
     * @param [type] $query
     * @param string $keywords
     * @return void
     */
    public function scopeSearch($query, $keywords)
    {
        return $query->where('name', 'LIKE', '%' . $keywords . '%')->orWhere('firstname', 'LIKE', '%' . $keywords . '%')->orWhere('lastname', 'LIKE', '%' . $keywords . '%');
    }

    /**
     * generate user code
     *
     * @return void
     */
    public function GenerateCode()
    {
        $this->code = $this->initials . $this->id;
        $this->save();
    }

    /**
     * generate initials
     *
     * @return void
     */
    public function GenerateInitials()
    {
        $initials = $this->GetInitials($this->firstname, $this->lastname, 2);
        $this->initials = utf8_encode($initials);
        $this->save();
    }

    /**
     * after create
     *
     * @return void
     */
    public function Prepare()
    {
        $this->AdjustRole();
    }

    /**
     * generate name
     *
     * @return void
     */
    public function GenerateName()
    {
        $this->name = $this->lastname . ' ' . $this->firstname;
        $this->save();
    }

    /**
     * create user permissions from schema
     *
     * @return void
     */
    public function AssignPermissionsFromSchema()
    {

        $permissions = $this->role->schema;

        foreach ($permissions as $permission) {
            UserPermission::create([
                'user_id' => $this->id,
                'module_id' => $permission->module_id,
                'can_read' => $permission->can_read,
                'can_edit' => $permission->can_edit,
                'can_delete' => $permission->can_delete,
                'can_add' => $permission->can_add
            ]);
        }
    }

    /**
     * does user has permission to do something
     *
     * @param string $code permission code name
     * @param string $attribute permission attribute name ('can_read', 'can_edit', 'can_delete', 'can_add')
     * @return boolean
     */
    public function IsPermitted($code, $attribute)
    {
        $permissions = $this->permissions;

        foreach ($permissions as $p) {
            if ($p->module->code == $code) {
                $attribute = $p->getAttribute($attribute);
                if ($attribute) return true;
            }
        }

        return false;
    }

    /**
     * update name
     *
     * @param string $firstname
     * @param string $lastname
     * @return void
     */
    public function UpdateName($firstname, $lastname)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->name = $lastname . ' ' . $firstname;
        $this->save();
    }

    /**
     * update role
     *
     * @param int $id
     * @return void
     */
    public function UpdateRole($id)
    {
        $this->role_id = $id;
        $this->save();
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
        $fullname = $this->lastname . ' ' . $this->firstname;
        $this->UpdateFullname($fullname);
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
        $fullname = $this->lastname . ' ' . $this->firstname;
        $this->UpdateFullname($fullname);
    }

    /**
     * update fullname
     *
     * @param string $value
     * @return void
     */
    public function UpdateFullname($value)
    {
        $this->name = $value;
        $this->save();
    }

    /**
     * update fullname
     *
     * @param string $value
     * @return void
     */
    public function UpdatePhone($value)
    {
        $this->phone = $value;
        $this->save();
    }

    /**
     * update password
     *
     * @param string $password
     * @return void
     */
    public function UpdatePassword($password)
    {
        $this->password = Hash::make($password);
        $this->save();
    }

    /**
     * update password
     *
     * @param string $password
     * @return void
     */
    public function UpdateEmail($email)
    {
        $this->email = $email;
        $this->save();
    }

    /**
     * is user super admin
     *
     * @return void
     */
    public function IsSuperAdmin()
    {
        if ($this->role_id == 1) return true;

        return false;
    }

    /**
     * is user lawyer
     *
     * @return boolean
     */
    public function IsLawyer()
    {
        if ($this->role_id == 4) return true;

        return false;
    }

    public function AdjustRole()
    {
        switch ($this->role_id) {
                //super administrator
            case 1:
                break;
                //administrator
            case 2:
                break;
                //user
            case 3:
                $this->ToggleAutoAsign(false);
                break;
                //lawyer
            case 4:
                $this->SetAsLawyer();
                break;
        }
    }

    /**
     * set user as lawyer
     *
     * @return void
     */
    public function SetAsLawyer()
    {
        if ($this->role_id == 4) {
            $this->CreateLawyer();
            $this->ToggleAutoAsign(true);
        }
    }

    /**
     * create model
     *
     * @return void
     */
    public function CreateLawyer()
    {
        $exists = Lawyer::where('user_id', $this->id)->first();
        if (!$exists) LawyerCreator::CreateLawyer($this->id, $this->firstname, $this->lastname, $this->phone, $this->email, true);
    }

    /**
     * toggle auto assign
     *
     * @param boolean $toggle
     * @return void
     */
    public function ToggleAutoAsign($toggle)
    {
        $this->is_auto_assigned = $toggle;
        $this->save();

        if ($this->lawyer) $this->lawyer->ToggleAutoAsign($toggle);
    }

    public function BeforeDelete()
    {
        UserUpdator::CancelPermissions($this);
        $this->UpdateRole(null);
        $this->password = null;
        $this->save();
    }
}
