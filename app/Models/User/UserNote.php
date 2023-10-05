<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'note', 'user_id'
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
     * update note
     *
     * @param string $value
     * @return void
     */
    public function UpdateNote($value)
    {
        $this->note = $value;
        $this->save();
    }
}
