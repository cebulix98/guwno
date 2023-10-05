<?php

namespace App\Http\Creators;

use App\Models\User;
use App\Models\User\Permission\UserPermission;
use App\Models\User\Permission\UserPermissionModule;
use App\Models\User\Permission\UserPermissionRole;
use App\Models\User\Permission\UserPermissionSchema;
use App\Models\User\Setting\UserSetting;
use App\Models\User\Setting\UserSettingCategory;
use App\Models\User\Setting\UserSettingDefault;
use App\Models\User\Setting\UserSettingOption;
use App\Models\User\UserNote;
use Illuminate\Support\Facades\Hash;

/** db model creator */
class UserCreator
{
    /**
     * create User
     *
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $firstname
     * @param string $lastname
     * @param int $role_id
     * @return User
     */
    public static function CreateUser($name, $email, $password, $firstname, $lastname, $role_id, $phone)
    {
        $model = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'firstname' => $firstname,
            'lastname' => $lastname,
            'role_id' => $role_id,
            'phone' => $phone,
        ]);

        return $model;
    }

    /**
     * create UserPermission
     *
     * @param int $user_id
     * @param int $module_id
     * @param boolean $can_read
     * @param boolean $can_edit
     * @param boolean $can_delete
     * @param boolean $can_add
     * @return UserPermission
     */
    public static function CreateUserPermission($user_id, $module_id, $can_read, $can_edit, $can_delete, $can_add)
    {
        $model = UserPermission::create([
            'user_id' => $user_id,
            'module_id' => $module_id,
            'can_read' => $can_read,
            'can_edit' => $can_edit,
            'can_delete' => $can_delete,
            'can_add' => $can_add
        ]);

        return $model;
    }

    /**
     * create UserPermissionModule
     *
     * @param string $name
     * @param string $code
     * @return UserPermissionModule
     */
    public static function CreateUserPermissionModule($name, $code)
    {
        $model = UserPermissionModule::create([
            'name' => $name,
            'code' => $code
        ]);

        return $model;
    }

    /**
     * create UserPermissionRole
     *
     * @param string $name
     * @param string $code
     * @return UserPermissionRole
     */
    public static function CreateUserPermissionRole($name, $code)
    {
        $model = UserPermissionRole::create([
            'name' => $name,
            'code' => $code
        ]);

        return $model;
    }

    /**
     * create UserPermissionSchema
     *
     * @param int $role_id
     * @param int $module_id
     * @param boolean $can_read
     * @param boolean $can_edit
     * @param boolean $can_delete
     * @param boolean $can_add
     * @return UserPermissionSchema
     */
    public static function CreateUserPermissionSchema($role_id, $module_id, $can_read, $can_edit, $can_delete, $can_add)
    {
        $model = UserPermissionSchema::create([
            'role_id' => $role_id,
            'module_id' => $module_id,
            'can_read' => $can_read,
            'can_edit' => $can_edit,
            'can_delete' => $can_delete,
            'can_add' => $can_add
        ]);

        return $model;
    }

    /**
     * create UserSetting
     *
     * @param int $user_id
     * @param int $option_id
     * @param string $value
     * @return UserSetting
     */
    public static function CreateUserSetting($user_id, $option_id, $value)
    {
        $model = UserSetting::create([
            'user_id' => $user_id,
            'option_id' => $option_id,
            'value' => $value
        ]);

        return $model;
    }

    /**
     * create UserSettingCategory
     *
     * @param string $name
     * @param string $code
     * @return UserSettingCategory
     */
    public static function CreateUserSettingCategory($name, $code)
    {
        $model = UserSettingCategory::create([
            'name' => $name,
            'code' => $code
        ]);

        return $model;
    }

    /**
     * create UserSettingDefault
     *
     * @param int $option_id
     * @param string $value
     * @return UserSettingDefault
     */
    public static function CreateUserSettingDefault($option_id, $value)
    {
        $model = UserSettingDefault::create([
            'option_id' => $option_id,
            'value' => $value
        ]);

        return $model;
    }

    /**
     * create UserSettingOption
     *
     * @param int $category_id
     * @param string $name
     * @param string $code
     * @param string $default
     * @return UserSettingOption
     */
    public static function CreateUserSettingOption($category_id, $name, $code, $default)
    {
        $model = UserSettingOption::create([
            'category_id' => $category_id,
            'name' => $name,
            'code' => $code,
            'default' => $default
        ]);

        return $model;
    }

    /**
     * create model
     *
     * @param int $user_id
     * @param string $note
     * @return UserNote
     */
    public static function CreateUserNote($user_id, $note)
    {
        $model = UserNote::create([
            'user_id' => $user_id,
            'note' => $note
        ]);

        return $model;
    }
}
