<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\User\Permission\UserPermission;
use Illuminate\Database\Seeder;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            $permissions = $user->role->schema;

            foreach ($permissions as $permission) {
                $exists = UserPermission::where('user_id', $user->id)->where('module_id', $permission->module_id)->first();
                if (!$exists) {
                    UserPermission::create([
                        'user_id' => $user->id,
                        'module_id' => $permission->module_id,
                        'can_read' => $permission->can_read,
                        'can_edit' => $permission->can_edit,
                        'can_delete' => $permission->can_delete,
                        'can_add' => $permission->can_add
                    ]);
                }
            }
        }
    }
}
