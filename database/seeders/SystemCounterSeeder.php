<?php

namespace Database\Seeders;

use App\Models\System\SystemCounter;
use Illuminate\Database\Seeder;

class SystemCounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = [
            [
                'name' => 'item', 'description' => '', 'count' => 100, 'count_default' => 100,
                'next_number' => '100', 'default_number' => '100'
            ],
        ];

        foreach ($objects as $obj) {
            $exists = SystemCounter::where('name',$obj['name'])->first();
            if(!$exists) SystemCounter::factory()->create($obj);
        }
    }
}
