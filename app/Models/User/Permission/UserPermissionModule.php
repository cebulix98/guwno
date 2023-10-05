<?php

namespace App\Models\User\Permission;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPermissionModule extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'code'
    ];
}
