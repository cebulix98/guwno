<?php

namespace Database\Seeders;

use App\Models\Motion\Motion;
use Illuminate\Database\Seeder;

class MotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = config('variables.seeds.seeds.motion');

        foreach ($objects as $obj) {
            $exists = Motion::where('code',$obj['code'])->first();
            if(!$exists) Motion::factory()->create($obj);
        }
    }
}
