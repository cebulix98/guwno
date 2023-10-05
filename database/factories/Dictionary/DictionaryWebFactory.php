<?php

namespace Database\Factories\Dictionary;

use App\Models\Dictionary\DictionaryWeb;
use Illuminate\Database\Eloquent\Factories\Factory;

class DictionaryWebFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DictionaryWeb::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'can_edit' => 1,
            'can_remove' => 1,
            'is_active' => 1
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (DictionaryWeb $model) {
            $model->GenerateKey();
            $model->GenerateCode();
        });
    }
}
