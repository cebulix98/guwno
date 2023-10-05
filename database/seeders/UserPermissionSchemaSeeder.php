<?php

namespace Database\Seeders;

use App\Models\User\Permission\UserPermissionSchema;
use Illuminate\Database\Seeder;

class UserPermissionSchemaSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = [
            //ROLA: SUPER ADMINISTRATOR

            //moduł: Słowniki
            ['role_id' => 1, 'module_id' => 1, 'can_read' => 1, 'can_edit' => 1, 'can_delete' => 1, 'can_add' => 1],
            //moduł: Ustawienia
            ['role_id' => 1, 'module_id' => 2, 'can_read' => 1, 'can_edit' => 1, 'can_delete' => 1, 'can_add' => 1],
            //moduł: Użytkownicy
            ['role_id' => 1, 'module_id' => 3, 'can_read' => 1, 'can_edit' => 1, 'can_delete' => 1, 'can_add' => 1],
            //moduł: Panel admina
            ['role_id' => 1, 'module_id' => 4, 'can_read' => 1, 'can_edit' => 1, 'can_delete' => 1, 'can_add' => 1],
            //moduł: Sprawy admin
            ['role_id' => 1, 'module_id' => 5, 'can_read' => 1, 'can_edit' => 1, 'can_delete' => 1, 'can_add' => 1],
            //moduł: Sprawy
            ['role_id' => 1, 'module_id' => 6, 'can_read' => 1, 'can_edit' => 1, 'can_delete' => 1, 'can_add' => 1],
            //moduł: Prawnicy
            ['role_id' => 1, 'module_id' => 7, 'can_read' => 1, 'can_edit' => 1, 'can_delete' => 1, 'can_add' => 1],
            //moduł: Przydzielanie prawników do spraw
            ['role_id' => 1, 'module_id' => 8, 'can_read' => 1, 'can_edit' => 1, 'can_delete' => 1, 'can_add' => 1],
            //moduł: Wnioski
            ['role_id' => 1, 'module_id' => 9, 'can_read' => 1, 'can_edit' => 1, 'can_delete' => 1, 'can_add' => 1],

            //ROLA: ADMINISTRATOR

            //moduł: Słowniki
            ['role_id' => 2, 'module_id' => 1, 'can_read' => 1, 'can_edit' => 1, 'can_delete' => 1, 'can_add' => 1],
            //moduł: Ustawienia
            ['role_id' => 2, 'module_id' => 2, 'can_read' => 1, 'can_edit' => 1, 'can_delete' => 1, 'can_add' => 1],
            //moduł: Użytkownicy
            ['role_id' => 2, 'module_id' => 3, 'can_read' => 1, 'can_edit' => 0, 'can_delete' => 0, 'can_add' => 0],
            //moduł: Panel admina
            ['role_id' => 2, 'module_id' => 4, 'can_read' => 1, 'can_edit' => 1, 'can_delete' => 1, 'can_add' => 1],
            //moduł: Sprawy admin
            ['role_id' => 2, 'module_id' => 5, 'can_read' => 1, 'can_edit' => 1, 'can_delete' => 1, 'can_add' => 1],
            //moduł: Sprawy
            ['role_id' => 2, 'module_id' => 6, 'can_read' => 1, 'can_edit' => 1, 'can_delete' => 1, 'can_add' => 1],
            //moduł: Prawnicy
            ['role_id' => 2, 'module_id' => 7, 'can_read' => 1, 'can_edit' => 1, 'can_delete' => 1, 'can_add' => 1],
            //moduł: Przydzielanie prawników do spraw
            ['role_id' => 2, 'module_id' => 8, 'can_read' => 1, 'can_edit' => 1, 'can_delete' => 1, 'can_add' => 1],
            //moduł: Wnioski
            ['role_id' => 2, 'module_id' => 9, 'can_read' => 1, 'can_edit' => 1, 'can_delete' => 1, 'can_add' => 1],

            //ROLA: Użytkownik

            //moduł: Słowniki
            ['role_id' => 3, 'module_id' => 1, 'can_read' => 0, 'can_edit' => 0, 'can_delete' => 0, 'can_add' => 0],
            //moduł: Ustawienia
            ['role_id' => 3, 'module_id' => 2, 'can_read' => 0, 'can_edit' => 0, 'can_delete' => 0, 'can_add' => 0],
            //moduł: Użytkownicy
            ['role_id' => 3, 'module_id' => 3, 'can_read' => 0, 'can_edit' => 0, 'can_delete' => 0, 'can_add' => 0],
            //moduł: Panel admina
            ['role_id' => 3, 'module_id' => 4, 'can_read' => 0, 'can_edit' => 0, 'can_delete' => 0, 'can_add' => 0],
            //moduł: Sprawy admin
            ['role_id' => 3, 'module_id' => 5, 'can_read' => 0, 'can_edit' => 0, 'can_delete' => 0, 'can_add' => 0],
            //moduł: Sprawy
            ['role_id' => 3, 'module_id' => 6, 'can_read' => 1, 'can_edit' => 1, 'can_delete' => 0, 'can_add' => 1],
            //moduł: Prawnicy
            ['role_id' => 3, 'module_id' => 7, 'can_read' => 0, 'can_edit' => 0, 'can_delete' => 0, 'can_add' => 0],
            //moduł: Przydzielanie prawników do spraw
            ['role_id' => 3, 'module_id' => 8, 'can_read' => 0, 'can_edit' => 0, 'can_delete' => 0, 'can_add' => 0],
            //moduł: Wnioski
            ['role_id' => 3, 'module_id' => 9, 'can_read' => 0, 'can_edit' => 0, 'can_delete' => 0, 'can_add' => 0],

            //ROLA: PRAWNIK

            //moduł: Słowniki
            ['role_id' => 4, 'module_id' => 1, 'can_read' => 0, 'can_edit' => 0, 'can_delete' => 0, 'can_add' => 0],
            //moduł: Ustawienia
            ['role_id' => 4, 'module_id' => 2, 'can_read' => 0, 'can_edit' => 0, 'can_delete' => 0, 'can_add' => 0],
            //moduł: Użytkownicy
            ['role_id' => 4, 'module_id' => 3, 'can_read' => 1, 'can_edit' => 0, 'can_delete' => 0, 'can_add' => 0],
            //moduł: Panel admina
            ['role_id' => 4, 'module_id' => 4, 'can_read' => 0, 'can_edit' => 0, 'can_delete' => 0, 'can_add' => 0],
            //moduł: Sprawy admin
            ['role_id' => 4, 'module_id' => 5, 'can_read' => 0, 'can_edit' => 0, 'can_delete' => 0, 'can_add' => 0],
            //moduł: Sprawy
            ['role_id' => 4, 'module_id' => 6, 'can_read' => 1, 'can_edit' => 1, 'can_delete' => 1, 'can_add' => 1],
            //moduł: Prawnicy
            ['role_id' => 4, 'module_id' => 7, 'can_read' => 1, 'can_edit' => 1, 'can_delete' => 0, 'can_add' => 0],
            //moduł: Przydzielanie prawników do spraw
            ['role_id' => 4, 'module_id' => 8, 'can_read' => 1, 'can_edit' => 1, 'can_delete' => 0, 'can_add' => 0],
            //moduł: Wnioski
            ['role_id' => 4, 'module_id' => 9, 'can_read' => 0, 'can_edit' => 0, 'can_delete' => 0, 'can_add' => 0],

        ];

        foreach ($objects as $obj) {
            $exists = UserPermissionSchema::where('role_id', $obj['role_id'])->where('module_id', $obj['module_id'])->first();
            if (!$exists) UserPermissionSchema::factory()->create($obj);
        }
    }
}
