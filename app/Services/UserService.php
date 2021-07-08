<?php


namespace App\Services;


use App\Models\User;

class UserService
{
    public function setInfoUser(User $user, array $info)
    {
        foreach($info as $key => $val) {
            $user->setInfo($key, $val);
        }
    }
}
