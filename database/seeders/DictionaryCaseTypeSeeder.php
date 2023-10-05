<?php

namespace Database\Seeders;

use App\Models\Dictionary\DictionaryCaseType;
use Illuminate\Database\Seeder;

class DictionaryCaseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = config('variables.seeds.seeds.case_type');

        foreach ($objects as $obj) {
            $exists = DictionaryCaseType::where('code',$obj['code'])->first();
            if(!$exists) DictionaryCaseType::factory()->create($obj);
        }
    }
}
