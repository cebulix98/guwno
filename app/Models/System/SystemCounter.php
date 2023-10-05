<?php

namespace App\Models\System;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemCounter extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'description', 'count', 'next_number', 'year', 'default_number', 'count_default', 'number_prefix'
    ];

    /**
     * Update name
     *
     * @param string $name
     * @return void
     */
    public function UpdateName($name)
    {
        $this->name = $name;
        $this->save();
    }

    /**
     * Update description
     *
     * @param string $value
     * @return void
     */
    public function UpdateDescription($value)
    {
        $this->description = $value;
        $this->save();
    }

    /**
     * increase count
     *
     * @param int $number
     * @return void
     */
    public function IncreaseCount($number)
    {
        $this->count += $number;
        $this->save();
    }

    /**
     * Update next number
     *
     * @param string $number
     * @return void
     */
    public function UpdateNumber($number)
    {
        $this->next_number = $number;
        $this->save();
    }

    /**
     * check year, if different reset counters
     *
     * @return void
     */
    public function CheckYear()
    {
        $current_year = Carbon::now()->format('Y');

        if ($this->year != $current_year) {
            $this->ResetCounters($current_year);
        }
    }

    /**
     * reset counters
     *
     * @param string $year
     * @return void
     */
    public function ResetCounters($year)
    {
        $this->year = $year;
        $this->count = $this->count_default;
        $this->number_prefix = Carbon::now()->format('y');
        $this->next_number = $this->default_number;
        $this->save();
    }

    /**
     * get next number
     *
     * @return void
     */
    public function GetNextNumber() {
        $this->CheckYear();
        $this->IncreaseCount(1);
        $this->UpdateNumber($this->count);
    }
}
