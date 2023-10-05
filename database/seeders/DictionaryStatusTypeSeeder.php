<?php

namespace Database\Seeders;

use App\Models\Dictionary\DictionaryStatusType;
use Illuminate\Database\Seeder;

class DictionaryStatusTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = config('variables.seeds.seeds.status');

        foreach ($objects as $obj) {
            $exists = DictionaryStatusType::where('code',$obj['code'])->first();
            if(!$exists) DictionaryStatusType::factory()->create($obj);
        }
    }
}
