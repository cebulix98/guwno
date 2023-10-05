<?php

namespace App\Models\User\Permission;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermissionSchema extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id', 'module_id', 'can_read', 'can_edit', 'can_delete', 'can_add'
    ];

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
     * relation: module
     *
     * @return UserPermissionModule
     */
    public function module()
    {
        return $this->hasOne(UserPermissionModule::class, 'id', 'module_id');
    }

    /**
     * update permissions
     *
     * @param boolean $can_read
     * @param boolean $can_edit
     * @param boolean $can_delete
     * @param boolean $can_add
     * @return void
     */
    public function UpdateAll($can_read, $can_edit, $can_delete, $can_add)
    {
        $this->can_read = $can_read;
        $this->can_edit = $can_edit;
        $this->can_delete = $can_delete;
        $this->can_add = $can_add;
        $this->save();
    }
}
