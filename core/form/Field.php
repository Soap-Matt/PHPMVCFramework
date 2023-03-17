<?php

namespace app\core\form;

use app\core\Model;

class Field
{
    private string $type;
    private Model $model;

    private string $attribute;

    const TYPE_TEXT = "text";
    const TYPE_EMAIL = "email";
    const TYPE_PASSWORD = "password";
    const TYPE_NUMBER = "number";

    /**
     * @param Model $model
     * @param string $attribute
     */
    public function __construct(Model $model, string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString()
    {
        $attribute = $this->attribute;
        error_log("ATTRIBUTE: $attribute");
        $attributeValue = $this->model->{$this->attribute};
        $additionalClasses = $this->model->hasError($attribute) ? "is-invalid" : "";
        $invalid_feedback = $this->model->getFirstError($attribute);
        $fieldType = $this->getType();

        return "
              <div class='form-group'>
                <label for='$attribute'>$attribute</label>
                <input type='$fieldType' class='form-control $additionalClasses' value='$attributeValue' name='$attribute' id='$attribute' placeholder='$attribute'>
                <div class='invalid-feedback'>$invalid_feedback</div>
            </div>
            ";
    }

    public function passwordField(): Field {
        $this->setType(self::TYPE_PASSWORD);
        return $this;
    }

    public function emailField(): Field {
        $this->setType(self::TYPE_EMAIL);
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    private function setType(string $type): void
    {
        $this->type = $type;
    }


}
