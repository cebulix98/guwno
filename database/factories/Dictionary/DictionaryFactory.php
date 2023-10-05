<?php

namespace Database\Factories\Dictionary;

use App\Models\Dictionary\Dictionary;
use Illuminate\Database\Eloquent\Factories\Factory;

class DictionaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dictionary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => "",
            'is_editable' => 0,
            'is_visible' => 0
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Dictionary $model) {
            $model->GenerateNameLang();
        });
    }
}
