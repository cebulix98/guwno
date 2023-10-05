<?php

namespace Database\Seeders;

use App\Models\Dictionary\DictionaryAddressType;
use Illuminate\Database\Seeder;

class DictionaryAddressTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = config('variables.seeds.seeds.address_type');

        foreach ($objects as $obj) {
            $exists = DictionaryAddressType::where('name',$obj['name'])->first();
            if(!$exists) DictionaryAddressType::factory()->create($obj);
        }
    }
}
