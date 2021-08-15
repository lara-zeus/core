<?php

namespace Database\Seeders;

use LaraZeus\Core\Models\Form;
use Illuminate\Database\Seeder;

class BoltSeeder extends Seeder
{
    public function run()
    {
        Form::factory()->count(1)
            ->hasSections(2)
            ->hasFields(2)
            ->hasResponses(2)
            ->hasFieldsResponses(2)
            ->create();
    }
}
