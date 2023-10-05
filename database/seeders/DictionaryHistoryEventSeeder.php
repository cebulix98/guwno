<?php

namespace Database\Seeders;

use App\Models\Dictionary\DictionaryHistoryEvent;
use Illuminate\Database\Seeder;

class DictionaryHistoryEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = config('variables.seeds.seeds.history_events');

        foreach ($objects as $obj) {
            $exists = DictionaryHistoryEvent::where('code', $obj['code'])->first();
            if (!$exists) DictionaryHistoryEvent::factory()->create($obj);
        }
    }
}
