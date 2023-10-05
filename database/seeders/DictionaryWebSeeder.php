<?php

namespace Database\Seeders;

use App\Models\Dictionary\DictionaryWeb;
use Illuminate\Database\Seeder;

class DictionaryWebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = config('variables.seeds.seeds.webs');

        foreach ($objects as $obj) {
            $exists = DictionaryWeb::where('code',$obj['code'])->first();
            if(!$exists) DictionaryWeb::factory()->create($obj);
        }
    }
}
