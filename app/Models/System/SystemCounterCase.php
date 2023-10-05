<?php

namespace App\Models\System;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemCounterCase extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code', 'current_user_id', 'current_order'
    ];

    /**
     * update value
     *
     * @param int $user_id
     * @return void
     */
    public function UpdateCurrentUser($user_id)
    {
        $this->current_user_id = $user_id;
        $this->save();
    }

    /**
     * update value
     *
     * @param int $order
     * @return void
     */
    public function UpdateCurrentOrder($order)
    {
        $this->current_order = $order;
        $this->save();
    }

    public function SetCurrentUser($user)
    {
        if ($user) {
            $this->UpdateCurrentUser($user->id);
            if ($user->lawyer) $this->UpdateCurrentOrder($user->lawyer->order);
        }
    }

    /**
     * get next assigned user
     *
     * @return User
     */
    public function GetNextAssignement()
    {
        if (!$this->current_user_id) return $this->GetFirstUser();

        return $this->GetNextUser();
    }

    /**
     * get first user from list
     *
     * @return User
     */
    public function GetFirstUser()
    {
        $user = User::where('is_auto_assigned', true)->whereIn('role_id', [2, 4])->first();
        $this->SetCurrentUser($user);

        return $user;
    }

    /**
     * get next user from list
     *
     * @return User
     */
    public function GetNextUser()
    {
        $user = User::where('is_auto_assigned', true)->whereIn('role_id', [2, 4])->where('id', '>', $this->current_user_id)->first();

        if ($user)  $this->SetCurrentUser($user);
        else {
            $user = $this->GetFirstUser();
        }

        return $user;
    }
}
