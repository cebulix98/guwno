<?php

namespace Database\Seeders;

use App\Models\User\Permission\UserPermissionModule;
use Illuminate\Database\Seeder;

class UserPermissionModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = [
            ['name' => 'Słowniki', 'code' => 'mdictionaries'],
            ['name' => 'Ustawienia', 'code' => 'msettings'],
            ['name' => 'Użytkownicy', 'code' => 'musers'],
            ['name' => 'Panel admina', 'code' => 'madmin'],
            ['name' => 'Sprawy admin', 'code' => 'mcases_admin'],
            ['name' => 'Sprawy', 'code' => 'mcases'],
            ['name' => 'Prawnicy', 'code' => 'mlawyers'],
            ['name' => 'Przydzielanie prawników do spraw', 'code' => 'mlawyers_cases'],
            ['name' => 'Zarządzanie wnioskami', 'code' => 'mmotions'],
        ];

        foreach ($objects as $obj) {
            $exists = UserPermissionModule::where('code',$obj['code'])->first();
            if(!$exists) UserPermissionModule::factory()->create($obj);
        }
    }
}
