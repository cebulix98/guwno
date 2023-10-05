<?php

namespace Database\Factories\Dictionary;

use App\Models\Dictionary\DictionaryAgreementUserType;
use Illuminate\Database\Eloquent\Factories\Factory;

class DictionaryAgreementUserTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DictionaryAgreementUserType::class;

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
