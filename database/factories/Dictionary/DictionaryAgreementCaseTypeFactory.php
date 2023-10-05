<?php

namespace Database\Factories\Dictionary;

use App\Models\Dictionary\DictionaryAgreementCaseType;
use Illuminate\Database\Eloquent\Factories\Factory;

class DictionaryAgreementCaseTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DictionaryAgreementCaseType::class;

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
}
