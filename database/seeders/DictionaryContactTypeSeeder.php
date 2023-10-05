<?php

namespace Database\Seeders;

use App\Models\Dictionary\DictionaryContactType;
use Illuminate\Database\Seeder;

class DictionaryContactTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = config('variables.seeds.seeds.contact_type');

        foreach ($objects as $obj) {
            $exists = DictionaryContactType::where('name',$obj['name'])->first();
            if(!$exists) DictionaryContactType::factory()->create($obj);
        }
    }
}
