<?php

namespace Database\Factories\Dictionary;

use App\Models\Dictionary\DictionaryAgreement;
use Illuminate\Database\Eloquent\Factories\Factory;

class DictionaryAgreementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DictionaryAgreement::class;

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
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (DictionaryAgreement $model) {
            $model->GenerateCode();
            $model->GenerateNameLang();
        });
    }
}
