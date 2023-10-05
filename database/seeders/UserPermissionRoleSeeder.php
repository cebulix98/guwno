<?php

namespace Database\Seeders;

use App\Models\User\Permission\UserPermissionRole;
use Illuminate\Database\Seeder;

class UserPermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = [
            ['name'=>'Super Administrator', 'code'=>'ras'],
            ['name'=>'Administrator', 'code'=>'ra'],
            ['name'=>'Użytkownik', 'code'=>'ru'],
            ['name'=>'Prawnik', 'code'=>'rl'],
        ];

        foreach ($objects as $obj) {
            $exists = UserPermissionRole::where('code',$obj['code'])->first();
            if(!$exists) UserPermissionRole::factory()->create($obj);
        }
    }
}
