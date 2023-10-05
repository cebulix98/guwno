<?php

namespace App\Models\User\Permission;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPermissionRole extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'code'
    ];

    /**
     * relation: schema
     *
     * @return UserPermissionSchema
     */
    public function schema()
    {
        return $this->hasMany(UserPermissionSchema::class, 'role_id', 'id');
    }
}
