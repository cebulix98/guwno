<?php

namespace Database\Seeders;

use App\Http\Creators\MotionCreator;
use App\Models\Motion\Motion;
use App\Models\Motion\MotionSetting;
use Illuminate\Database\Seeder;

class MotionSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $motions = Motion::all();

        foreach ($motions as $motion) {
            $exists = MotionSetting::where('motion_id', $motion->id)->first();
            if (!$exists) MotionCreator::CreateMotionSetting($motion->id, 0, 1, 0);
        }
    }
}
