<?php

namespace App\Models\User\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSettingOption extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id', 'name', 'code', 'default'
    ];

     /**
     * relation: category
     *
     * @return UserSettingOption
     */
    public function category()
    {
        return $this->hasOne(UserSettingCategory::class, 'id', 'category_id');
    }
}
