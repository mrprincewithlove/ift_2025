<?php

namespace Database\Factories;

use App\Models\Visa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visa>
 */
class VisaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Visa::class;

    public function definition(): array
    {
        return [
            'surname'             => fake()->name,
            'name'                => fake()->name,
            'middle_name'         => fake()->name,
            'born_date'           => fake()->date,
            'born_place'          => fake()->country,
            'citizen'             => fake()->countryISOAlpha3,
            'passport_number'     => fake()->randomLetter.''.fake()->randomLetter.'-'. fake()->numberBetween(111111,  999999),
            'passport_date'       => fake()->date,
            'education'           => fake()->company,
            'coming_text'         => fake()->words(5, true),
            'visa_date'           => '10 gun',
            'hotel'               => array_rand(['Yyldyz', 'Arkadag']),
        ];
    }
}
