<?php

namespace Database\Seeders;

use App\Models\System\SystemResponseFooter;
use Illuminate\Database\Seeder;

class SystemResponseFooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = config('variables.seeds.seeds.response_footers');

        foreach ($objects as $obj) {
            $exists = SystemResponseFooter::where('code',$obj['code'])->first();
            if(!$exists) SystemResponseFooter::factory()->create($obj);
        }
    }
}
