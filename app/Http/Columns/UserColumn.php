<?php

namespace App\Http\Columns;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/** db model creator */
class UserColumn
{
    public const USERS = ['name', 'email', 'password', 'firstname', 'lastname', 'role_id', 'phone', 'code', 'initials'];
    public const USER_PERMISSIONS = ['user_id', 'module_id', 'can_read', 'can_edit', 'can_delete', 'can_add'];
    public const USER_PERMISSION_MODULES = ['name', 'code'];
    public const USER_PERMISSION_ROLES = ['name', 'code'];
    public const USER_PERMISSION_SCHEMAS = ['role_id', 'module_id', 'can_read', 'can_edit', 'can_delete', 'can_add'];
    public const USER_SETTINGS = ['user_id', 'option_id', 'value'];
    public const USER_SETTING_CATEGORIES = ['name', 'code'];
    public const USER_SETTING_DEFAULT = ['option_id', 'value'];
    public const USER_SETTING_OPTIONS = ['category_id', 'name', 'code', 'default'];

    public static function CreateUser($attribute)
    {
        Schema::table('users', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
            }
        });
    }

    public static function CreateUserPermission($attribute)
    {
        Schema::table('user_permissions', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'user_id':
                    $table->bigInteger('user_id')->nullable()->unsigned()->comment('id uzytkownika');
                    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                    break;
                case 'module_id':
                    $table->bigInteger('module_id')->nullable()->unsigned()->comment('id modułu');
                    $table->foreign('module_id')->references('id')->on('user_permission_modules')->onDelete('cascade');
                    break;
                case 'can_read':
                    $table->boolean('can_read')->nullable()->comment('moze widziec');
                    break;
                case 'can_add':
                    $table->boolean('can_add')->nullable()->comment('moze dodawac');
                    break;
                case 'can_edit':
                    $table->boolean('can_edit')->nullable()->comment('moze edytowac');
                    break;
                case 'can_delete':
                    $table->boolean('can_delete')->nullable()->comment('moze usuwac');
                    break;
            }
        });
    }

    public static function CreateUserPermissionModule($attribute)
    {
        Schema::table('user_permission_modules', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'name':
                    $table->string('name')->nullable()->comment('nazwa')->index();
                    break;
                case 'code':
                    $table->string('code')->nullable()->comment('kod')->index();
                    break;
            }
        });
    }

    public static function CreateUserPermissionRole($attribute)
    {
        Schema::table('user_permission_roles', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'name':
                    $table->string('name')->nullable()->comment('nazwa')->index();
                    break;
                case 'code':
                    $table->string('code')->nullable()->comment('kod')->index();
                    break;
            }
        });
    }

    public static function CreateUserPermissionSchema($attribute)
    {
        Schema::table('user_permission_schemas', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'role_id':
                    $table->bigInteger('role_id')->nullable()->unsigned()->comment('id roli');
                    $table->foreign('role_id')->references('id')->on('user_permission_roles')->onDelete('cascade');
                    break;
                case 'module_id':
                    $table->bigInteger('module_id')->nullable()->unsigned()->comment('id modułu');
                    $table->foreign('module_id')->references('id')->on('user_permission_modules')->onDelete('cascade');
                    break;
                case 'can_read':
                    $table->boolean('can_read')->nullable()->comment('moze widziec');
                    break;
                case 'can_add':
                    $table->boolean('can_add')->nullable()->comment('moze dodawac');
                    break;
                case 'can_edit':
                    $table->boolean('can_edit')->nullable()->comment('moze edytowac');
                    break;
                case 'can_delete':
                    $table->boolean('can_delete')->nullable()->comment('moze usuwac');
                    break;
            }
        });
    }

    public static function CreateUserSetting($attribute)
    {
        Schema::table('user_settings', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'user_id':
                    $table->bigInteger('user_id')->nullable()->unsigned()->comment('id uzytkownika');
                    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                    break;
                case 'option_id':
                    $table->bigInteger('option_id')->nullable()->unsigned()->comment('id opcji');
                    $table->foreign('option_id')->references('id')->on('user_setting_options')->onDelete('cascade');
                    break;
                case 'value':
                    $table->string('value')->nullable()->comment('wartość');
                    break;
            }
        });
    }

    public static function CreateUserSettingCategory($attribute)
    {
        Schema::table('user_setting_categories', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'name':
                    $table->string('name')->nullable()->comment('nazwa')->index();
                    break;
                case 'code':
                    $table->string('code')->nullable()->comment('kod')->index();
                    break;
            }
        });
    }

    public static function CreateUserSettingDefault($attribute)
    {
        Schema::table('user_setting_defaults', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'option_id':
                    $table->bigInteger('option_id')->nullable()->unsigned()->comment('id opcji');
                    $table->foreign('option_id')->references('id')->on('user_setting_options')->onDelete('cascade');
                    break;
                case 'value':
                    $table->string('value')->nullable()->comment('wartość');
                    break;
            }
        });
    }

    public static function CreateUserSettingOption($attribute)
    {
        Schema::table('user_setting_options', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'category_id':
                    $table->bigInteger('category_id')->nullable()->unsigned()->comment('id kategorii');
                    $table->foreign('category_id')->references('id')->on('user_setting_categories')->onDelete('cascade');
                    break;
                case 'name':
                    $table->string('name')->nullable()->comment('nazwa')->index();
                    break;
                case 'code':
                    $table->string('code')->nullable()->comment('kod')->index();
                    break;
                case 'default':
                    $table->string('default')->nullable()->comment('domyślna wartość');
                    break;
            }
        });
    }
}
