<?php

namespace Database\Factories\Dictionary;

use App\Models\Dictionary\DictionaryStatusType;
use Illuminate\Database\Eloquent\Factories\Factory;

class DictionaryStatusTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DictionaryStatusType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => "",
            'can_edit' => 0,
            'can_remove' => 0,
            'is_programmed' => 1
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (DictionaryStatusType $model) {
            $model->GenerateNameLang();
        });
    }
}
