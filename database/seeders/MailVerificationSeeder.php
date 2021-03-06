<?php

namespace Database\Seeders;

use App\Models\MailVerification;
use Illuminate\Database\Seeder;

class MailVerificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MailVerification::factory()
        ->count(3)
        ->create();
    }
}
