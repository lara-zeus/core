<?php

namespace Database\Factories;

use LaraZeus\Core\Models\Field;
use LaraZeus\Core\Models\FieldResponse;
use LaraZeus\Core\Models\Form;
use LaraZeus\Core\Models\Response;
use Illuminate\Database\Eloquent\Factories\Factory;

class FieldResponseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FieldResponse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'form_id' => Form::factory(),
            'field_id' => Field::factory(),
            'response_id' => Response::factory(),
            'response'  => $this->faker->words(3, true),
        ];
    }
}
