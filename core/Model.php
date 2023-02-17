<?php

namespace app\core;

abstract class Model
{
    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';

    public array $errors;


    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    abstract protected function rules(): array;

    public function validate()
    {
//        [
//            "firstName" => [self::RULE_REQUIRED],
//            "lastName" => [self::RULE_REQUIRED],
//            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL],
//            "password" => [self::RULE_REQUIRED, [self::RULE_MIN, 5], [self::RULE_MAX, 11]],
//            "passwordConfirmation" => [self::RULE_REQUIRED, [self::RULE_MATCH, "match" => "password"]]
//        ];
        foreach ($this->rules() as $attribute => $rules) {
            foreach ($rules as $rule) {
                $value = $this->{$attribute};
                $ruleName = $rule;
                if (is_array($rule)) {
                    $ruleName = $rule[0];
                }

                switch ($ruleName) {
                    case self::RULE_REQUIRED:
                        if (!$value) {
                            $this->addError($attribute, $ruleName);
                        }
                        break;
                    case self::RULE_EMAIL:
                        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                            $this->addError($attribute, $ruleName);
                        }
                        break;
                    case self::RULE_MATCH:
                        $value_to_match = $this->{$rule["match"]};
                        if ($value !== $value_to_match) {
                            $this->addError($attribute, $ruleName, $rule);
                        }
                        break;
                    case self::RULE_MIN:
                        if (strlen($value) < $rule["min"]) {
                            $this->addError($attribute, $ruleName, $rule);
                        }
                        break;
                    case self::RULE_MAX:
                        if (strlen($value) > $rule["max"]) {
                            $this->addError($attribute, $ruleName, $rule);
                        }
                        break;

                }
            }
        }

        return empty($this->errors);
    }

    private function addError(string $attribute, string $ruleName, $params = []): void
    {
        $message = $this->getErrorMessages()[$ruleName] ?? '';
        foreach ($params as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
        }
        $this->errors[$attribute][] = $message;
    }

    private function getErrorMessages(): array
    {
        return [
            self::RULE_REQUIRED => "This field is required",
            self::RULE_EMAIL => "Must be a valid email address",
            self::RULE_MAX => "Field must not be longer than {max} characters",
            self::RULE_MIN => "Field must be longer than {min} characters",
            self::RULE_MATCH => "Field does not match {match}"
        ];
    }

}
