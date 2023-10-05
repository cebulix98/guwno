<?php

namespace Database\Factories\Dictionary;

use App\Models\Dictionary\DictionaryContactCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class DictionaryContactCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DictionaryContactCategory::class;

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
        ];
    }

     /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (DictionaryContactCategory $model) {
            $model->GenerateNameLang();
        });
    }
}
