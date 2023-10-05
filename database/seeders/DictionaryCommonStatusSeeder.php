<?php

namespace Database\Seeders;

use App\Models\Dictionary\DictionaryCommonStatus;
use Illuminate\Database\Seeder;

class DictionaryCommonStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = config('variables.seeds.seeds.status_common');

        foreach ($objects as $obj) {
            $exists = DictionaryCommonStatus::where('code',$obj['code'])->first();
            if(!$exists) DictionaryCommonStatus::factory()->create($obj);
        }
    }
}
