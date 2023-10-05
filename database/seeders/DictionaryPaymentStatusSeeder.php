<?php

namespace Database\Seeders;

use App\Models\Dictionary\DictionaryPaymentStatus;
use Illuminate\Database\Seeder;

class DictionaryPaymentStatusSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = config('variables.seeds.seeds.status_payment');

        foreach ($objects as $obj) {
            $exists = DictionaryPaymentStatus::where('code',$obj['code'])->first();
            if(!$exists) DictionaryPaymentStatus::factory()->create($obj);
        }
    }
}
