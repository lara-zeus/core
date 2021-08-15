<?php

namespace Database\Factories;

use LaraZeus\Core\Models\Collection;
use LaraZeus\Core\Models\Form;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Form::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = config('auth.providers.users.model')::factory()->create();

        Collection::factory()->count(2)->for($user)->create();

        return [
            'name'  => $this->faker->words(3, true),
            'user_id' => $user->id,
            'layout' => $this->faker->numberBetween(1,2),
            'ordering' => $this->faker->numberBetween(1,20),
            'desc' => $this->faker->text(),
            'slug' => $this->faker->slug(),
            'is_active' => 1,
            'start_date' => $this->faker->dateTime(),
            'end_date' => $this->faker->dateTime(),
        ];

    }

}
