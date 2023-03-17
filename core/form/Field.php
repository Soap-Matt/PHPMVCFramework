<?php

namespace app\core\form;

use app\core\Model;

class Field
{
    private Model $model;

    private string $attribute;

    /**
     * @param Model $model
     * @param string $attribute
     */
    public function __construct(Model $model, string $attribute)
    {
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


        return "
              <div class='form-group'>
                <label for='$attribute'>$attribute</label>
                <input type='text' class='form-control $additionalClasses' value='$attributeValue' name='$attribute' id='$attribute' placeholder='$attribute'>
                <div class='invalid-feedback'>$invalid_feedback</div>
            </div>
            ";
    }


}
