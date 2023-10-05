<?php

namespace Database\Seeders;

use App\Models\Dictionary\DictionaryContactCategory;
use Illuminate\Database\Seeder;

class DictionaryContactCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = config('variables.seeds.seeds.contact_category');

        foreach ($objects as $obj) {
            $exists = DictionaryContactCategory::where('code',$obj['code'])->first();
            if(!$exists) DictionaryContactCategory::factory()->create($obj);
        }
    }
}
