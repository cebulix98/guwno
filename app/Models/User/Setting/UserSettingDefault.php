<?php

namespace App\Models\User\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSettingDefault extends Model
{
    use HasFactory;

    protected $fillable = [
        'option_id', 'value'
    ];

     /**
     * relation: option
     *
     * @return UserSettingOption
     */
    public function option()
    {
        return $this->hasOne(UserSettingOption::class, 'id', 'option_id');
    }
}
