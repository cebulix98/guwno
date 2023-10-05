<?php

namespace Database\Seeders;

use App\Models\Dictionary\Dictionary;
use Illuminate\Database\Seeder;

class DictionarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = config('variables.seeds.seeds.dictionary');

        foreach ($objects as $obj) {
            $exists = Dictionary::where('code',$obj['code'])->first();
            if(!$exists) Dictionary::factory()->create($obj);
        }
    }
}
