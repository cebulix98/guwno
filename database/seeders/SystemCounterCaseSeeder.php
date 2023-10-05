<?php

namespace Database\Seeders;

use App\Models\System\SystemCounterCase;
use Illuminate\Database\Seeder;

class SystemCounterCaseSeeder extends Seeder
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
                'code' => 'case_auto'
            ],
        ];

        foreach ($objects as $obj) {
            $exists = SystemCounterCase::where('code', $obj['code'])->first();
            if (!$exists) SystemCounterCase::factory()->create($obj);
        }
    }
}
