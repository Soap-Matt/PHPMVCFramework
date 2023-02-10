<?php

namespace app\models;

use app\core\Model;

class RegisterModel extends Model
{
    public string $firstName;
    public string $lastName;
    public string $email;
    public string $password;
    public string $passwordConfirmation;

    public function register(): bool
    {
        return true;
    }

}
