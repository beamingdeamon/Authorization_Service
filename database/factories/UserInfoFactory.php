<?php

namespace Database\Factories;

use App\Models\UserInfo;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserInfoFactory extends Factory
{
    protected $model = UserInfo::class;
    public function definition()
    {
        return [
            'user_id'=> User::all()->random()->id,
            'first_name'=> $this->faker->firstName,
            'last_name'=> $this->faker->lastName,
            'role_id' => Role::all()->random()->id,
        ];
    }
}
