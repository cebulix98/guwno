<?php

namespace Database\Factories\Dictionary;

use App\Models\Dictionary\DictionaryContactType;
use Illuminate\Database\Eloquent\Factories\Factory;

class DictionaryContactTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DictionaryContactType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => "",
            'can_edit' => 1,
            'can_remove' => 1,
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (DictionaryContactType $model) {
            $model->GenerateCode();
            $model->GenerateNameLang();
        });
    }
}
