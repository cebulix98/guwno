<?php

namespace Database\Seeders;

use App\Models\Dictionary\DictionaryCaseStatus;
use Illuminate\Database\Seeder;

class DictionaryCaseStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = config('variables.seeds.seeds.status_case');

        foreach ($objects as $obj) {
            $exists = DictionaryCaseStatus::where('code',$obj['code'])->first();
            if(!$exists) DictionaryCaseStatus::factory()->create($obj);
        }
    }
}
