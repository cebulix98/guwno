<?php

namespace App\Http\Updators;

use App\Http\Creators\UserCreator;
use App\Models\User\Permission\UserPermission;
use App\Models\User\Permission\UserPermissionModule;
use App\Models\User\Permission\UserPermissionSchema;

class UserUpdator
{

    /**
     * update selected attribute
     *
     * @param * $model
     * @param string $value
     * @param string $selector selector name
     * @return void
     */
    public static function Selector($model, $value, $selector)
    {
        switch ($selector) {
            case 'firstname':
                $model->UpdateFirstname($value);
                break;
            case 'lastname':
                $model->UpdateLastname($value);
                break;
            case 'verify':
                CommonUpdator::Verify($model, $value);
                break;
            case 'name':
                CommonUpdator::UpdateName($model, $value);
                break;
            case 'phone':
                CommonUpdator::UpdatePhone($model, $value);
        }
    }

    /**
     * update name
     *
     * @param User $model
     * @param string $firstname
     * @param string $lastname
     * @return void
     */
    public static function UpdateName($model, $firstname, $lastname)
    {
        $model->UpdateName($firstname, $lastname);
    }

    /**
     * update password
     *
     * @param User $model
     * @param string $password
     * @return void
     */
    public static function UpdatePassword($model, $password)
    {
        $model->UpdatePassword($password);
    }

    /**
     * update user role
     *
     * @param User $model
     * @param int $value
     * @return void
     */
    public static function UpdateRole($model, $value)
    {
        $model->UpdateRole($value);
        UserUpdator::UpdatePermissions($model);
    }

    /**
     * update user permissions according to schema
     *
     * @param User $model
     * @return void
     */
    public static function UpdatePermissions($model)
    {
        $permissions = $model->role->schema;

        foreach ($permissions as $permission) {
            $db_permission = UserPermission::where('user_id', '=', $model->id)->where('module_id', '=', $permission->module_id)->first();

            if ($db_permission != null) {
                UserUpdator::UpdateSinglePermission($db_permission, $permission->can_read, $permission->can_edit, $permission->can_delete, $permission->can_add);
            } else {
                UserCreator::CreateUserPermission($model->id, $permission->module_id, $permission->can_read, $permission->can_edit, $permission->can_delete, $permission->can_add);
            }
        }
    }

    public static function CancelPermissions($model) {
        $permissions = $model->permissions;

        foreach($permissions as $permission) {
            if($permission) {
                UserUpdator::UpdateSinglePermission($permission, null, null, null, null);
            }
        } 
    }

    /**
     * update single user permission
     *
     * @param UserPermission $model
     * @param boolean $can_read
     * @param boolean $can_edit
     * @param boolean $can_delete
     * @param boolean $can_add
     * @return void
     */
    public static function UpdateSinglePermission($model, $can_read, $can_edit, $can_delete, $can_add)
    {
        $model->UpdateAll($can_read, $can_edit, $can_delete, $can_add);
    }
}
