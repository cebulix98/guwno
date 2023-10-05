<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserResponseFooter extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code', 'content', 'is_primary', 'user_id'
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
     * update attribute
     *
     * @param string $content
     * @return void
     */
    public function UpdateContent($content)
    {
        $this->content = $content;
        $this->save();
    }
}
