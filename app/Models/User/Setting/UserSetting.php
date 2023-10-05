<?php

namespace App\Models\User\Setting;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'option_id', 'value'
    ];

     /**
     * relation: user
     *
     * @return User
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

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
