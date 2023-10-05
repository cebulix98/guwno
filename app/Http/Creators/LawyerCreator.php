<?php

namespace App\Http\Creators;

use App\Models\Lawyer\Lawyer;

/** db model creator */
class LawyerCreator
{
    /**
     * create model
     *
     * @param int $user_id
     * @param string $firstname
     * @param string $lastname
     * @param string $phone
     * @param string $email
     * @return Lawyer
     */
    public static function CreateLawyer($user_id, $firstname, $lastname, $phone, $email, $is_auto_assigned)
    {
        $model = Lawyer::create([
            'user_id' => $user_id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'phone' => $phone,
            'email' => $email,
            'is_auto_assigned' => $is_auto_assigned,
        ]);

        $model->GenerateOrder();

        return $model;
    }
}
