<?php

namespace Database\Seeders;

use App\Models\Motion\MotionField;
use Illuminate\Database\Seeder;

class MotionFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = config('variables.seeds.motions.motion_fields');

        foreach ($objects as $obj) {
            $exists = MotionField::where('code',$obj['code'])->first();
            if(!$exists) MotionField::factory()->create($obj);
        }
    }
}
