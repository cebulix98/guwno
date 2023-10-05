<?php

namespace App\Models\Lawyer;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lawyer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'firstname', 'lastname', 'phone', 'email', 'is_auto_assigned', 'order'
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
     * relation: contacts
     *
     * @return LawyerContact
     */
    public function contacts()
    {
        return $this->hasMany(LawyerContact::class, 'lawyer_id', 'id');
    }

    /**
     * update name
     *
     * @param string $firstname
     * @param string $lastname
     * @return void
     */
    public function UpdateFullname($firstname, $lastname)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->save();
    }

    /**
     * update firstname
     *
     * @param string $value
     * @return void
     */
    public function UpdateFirstname($value)
    {
        $this->firstname = $value;
        $this->save();
    }

    /**
     * update lastname
     *
     * @param string $value
     * @return void
     */
    public function UpdateLastname($value)
    {
        $this->lastname = $value;
        $this->save();
    }

    /**
     * update value
     *
     * @param string $value
     * @return void
     */
    public function UpdatePhone($value)
    {
        $this->phone = $value;
        $this->save();
    }

    /**
     * update value
     *
     * @param string $value
     * @return void
     */
    public function UpdateEmail($value)
    {
        $this->email = $value;
        $this->save();
    }

    /**
     * toggle auto assign
     *
     * @param boolean $toggle
     * @return void
     */
    public function ToggleAutoAsign($toggle)
    {
        $this->is_auto_assigned = $toggle;
        $this->save();
    }

    public function GenerateOrder() {
        $this->order = $this->id;
        $this->save();
    }
}
