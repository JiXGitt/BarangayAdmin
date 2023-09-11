<?php


namespace App\Core\Form;

use App\Core\BaseModel;

class Field
{

    const TYPE_TEXT = 'text';
    const TYPE_PASSWORD = 'password';
    const TYPE_NUMBER = 'number';

    public string $type;
    public BaseModel $model;
    public string $attr;

    public function __construct(BaseModel $model, string $attr)
    {
        $this->type = self::TYPE_TEXT;
        $this->model = $model;
        $this->attr = $attr;
    }

    public function __toString()
    {
        return sprintf('    
            <div class="field">
                <label class="label">%s</label>
                <input class="input %s" type="%s" name="%s" value="%s">
                <p class="help is-danger">%s</p>
            </div>
            ',
            $this->model->getLabel($this->attr),
            $this->model->hasError($this->attr) ? 'is-danger' : '',
            $this->type,
            $this->attr,
            $this->model->{$this->attr},
            $this->model->getFirstError($this->attr),
            
        );
    }

    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this; // to allow chaining of methods
    }

}