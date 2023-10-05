<?php

namespace App\Models\User\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSettingCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'code'
    ];
}
