<?php

namespace Database\Factories\Dictionary;

use App\Models\Dictionary\DictionaryHistoryEvent;
use Illuminate\Database\Eloquent\Factories\Factory;

class DictionaryHistoryEventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DictionaryHistoryEvent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'can_edit' => 0,
            'can_remove' => 0,
        ];
    }
}
