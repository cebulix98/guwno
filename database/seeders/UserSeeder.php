<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exists = User::where('email', 'test@mail.com')->first();
        if (!$exists) {
            $user = User::factory()->create(
                [
                    'name' => 'SYSTEM',
                    'firstname' => 'SYSTEM',
                    'lastname' => '1',
                    'initials' => 'Sy1',
                    // 'code' => 'SY111',
                    'password' => bcrypt('test'),
                    'email' => 'test@mail.com',
                    'role_id' => 1
                ]
            );
        }
    }
}
