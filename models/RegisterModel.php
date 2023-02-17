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

    protected function rules(): array
    {
        return [
            "firstName" => [self::RULE_REQUIRED],
            "lastName" => [self::RULE_REQUIRED],
            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL],
            "password" => [self::RULE_REQUIRED, [self::RULE_MIN, "min" => 5], [self::RULE_MAX, "max" => 11]],
            "passwordConfirmation" => [self::RULE_REQUIRED, [self::RULE_MATCH, "match" => "password"]]
        ];
    }


}
