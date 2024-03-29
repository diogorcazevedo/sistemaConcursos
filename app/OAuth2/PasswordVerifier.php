<?php
/**
 * Created by PhpStorm.
 * User: diogoazevedo
 * Date: 07/11/15
 * Time: 20:46
 */

namespace IS\OAuth2;

use Illuminate\Support\Facades\Auth;


class PasswordVerifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }

}