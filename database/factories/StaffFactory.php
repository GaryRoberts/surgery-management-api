<?php

namespace Database\Factories;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StaffFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Staff::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        ['email' => 'william@speurgroup.com',
            'staffType'=> 'DOCTOR',
            'fname'=> 'William',
            'lname'=> 'Johnson',
            'phone'=> '18766234459',
            'password' => Hash::make('password'),
         ];
    }
}

