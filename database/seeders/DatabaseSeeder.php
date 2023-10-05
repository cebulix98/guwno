<?php

namespace Database\Seeders;

use App\Models\Dictionary\DictionaryCaseStatus;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
                DictionarySeeder::class,
                DictionaryStatusTypeSeeder::class,
                DictionaryAddressTypeSeeder::class,
                DictionaryContactCategorySeeder::class,
                DictionaryContactTypeSeeder::class,
                FileAssetDirectorySeeder::class,
                SystemCounterSeeder::class,
                UserPermissionRoleSeeder::class,
                UserPermissionModuleSeeder::class,
                UserPermissionSchemaSeeder::class,
                UserSeeder::class,
                UserPermissionSeeder::class,
                DictionaryCommonStatusSeeder::class,
                DictionaryCaseStatusSeeder::class,
                DictionaryCaseTypeSeeder::class,
                MotionSeeder::class,
                DictionaryHistoryEventSeeder::class,
                SystemCounterCaseSeeder::class,
                MotionFieldSeeder::class,
                MotionSettingSeeder::class,
                DictionaryWebSeeder::class,
                DictionaryPaymentStatusSeeder::class,
                SystemResponseFooterSeeder::class
            ]);
    }
}
