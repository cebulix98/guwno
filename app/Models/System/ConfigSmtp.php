<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigSmtp extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_verified',
        'host',
        'port',
        'username',
        'password',
        'encryption',
        'from_email',
        'from_name',
        'verified_at'
    ];

    public function Verify($toggle)
    {
        $this->is_verified = $toggle;
        $this->save();
    }

    /**
     * update attribute
     *
     * @param * $value
     * @return void
     */
    public function UpdatePort($value)
    {
        $this->port = $value;
        $this->save();
    }

    /**
     * update attribute
     *
     * @param * $value
     * @return void
     */
    public function UpdateUsername($value)
    {
        $this->username = $value;
        $this->save();
    }

    /**
     * update attribute
     *
     * @param * $value
     * @return void
     */
    public function UpdatePassword($value)
    {
        $this->password = $value;
        $this->save();
    }

    /**
     * update attribute
     *
     * @param * $value
     * @return void
     */
    public function UpdateEncryption($value)
    {
        $this->encryption = $value;
        $this->save();
    }

    /**
     * update attribute
     *
     * @param * $value
     * @return void
     */
    public function UpdateFromEmail($value)
    {
        $this->from_email = $value;
        $this->save();
    }

    /**
     * update attribute
     *
     * @param * $value
     * @return void
     */
    public function UpdateHost($value)
    {
        $this->host = $value;
        $this->save();
    }

    /**
     * update attribute
     *
     * @param * $value
     * @return void
     */
    public function UpdateFromName($value)
    {
        $this->from_name = $value;
        $this->save();
    }

    public function UpdateAll($host, $port, $username, $password, $encryption, $from_email, $from_name)
    {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->encryption = $encryption;
        $this->from_email = $from_email;
        $this->from_name = $from_name;

        $this->save();
    }
}
