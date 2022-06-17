<?php

namespace App\Containers\AppSection\Drive\Data\Factories;

use App\Containers\AppSection\Drive\Models\Drive;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class DriveFactory extends ParentFactory
{
    protected $model = Drive::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
