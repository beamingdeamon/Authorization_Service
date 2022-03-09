<?php

namespace Database\Factories;

use App\Models\MailVerification;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MailVerificationFactory extends Factory
{   
    
    protected $model = MailVerification::class;
    public function definition()
    {
        return [
            'user_id'=> User::all()->random()->id,
            'verified'=> $this->faker->randomElement([0,1]),
        ];
    }
}
