<?php

namespace App\Core;

abstract class BaseModel
{

    public const RULE_REQUIRED = 'required';
    public const RULE_USERNAME = 'username';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public const RULE_UNIQUE = 'unique';
    public const RULE_NUMERIC = 'numeric';
    public array $errors = [];
    public function labels()
    {
        return [];
    }
    abstract public function rules(): array;

    // this function is used to load the data from the database
    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                // assign the value to the property
                $this->{$key} = $value;
            }
        }
    }

    // this function is used to get the label of the attribute
    public function getLabel($attr)
    {
        return $this->labels()[$attr] ?? $attr;
    }

    public function errorMessages()
    {
        return [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_USERNAME => 'This field must be a valid username',
            self::RULE_MIN => 'Min length of this field must be {min}',
            self::RULE_MAX => 'Max length of this field must be {max}',
            self::RULE_MATCH => 'This field must be the same as {match}',
            self::RULE_UNIQUE => 'Record with this {field} already exists',
            self::RULE_NUMERIC => 'This field must be a number',
        ];
    }

    public function addErrorForRules(string $attr, string $rule, $params = [])
    {
        // get the error message for the rule. If the rule is not found, then use an empty string
        $message = $this->errorMessages()[$rule] ?? '';

        // replace the params in the message
        foreach ($params as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
        }

        // add the error message to the errors array
        $this->errors[$attr][] = $message;
    }

    public function addError(string $attr, string $message)
    {
        $this->errors[$attr][] = $message;
    }

    public function validate()
    {
        foreach ($this->rules() as $attr => $rules) {
            $value = $this->{$attr};
            foreach ($rules as $rule) {
                $rulename = $rule;
                if (!is_string($rulename)) {
                    $rulename = $rule[0];
                }

                if ($rulename === self::RULE_REQUIRED && !$value) {
                    $this->addErrorForRules($attr, self::RULE_REQUIRED);
                }

                if ($rulename === self::RULE_USERNAME && !preg_match('/^[a-zA-Z0-9_]+$/', $value)) {
                    $this->addErrorForRules($attr, self::RULE_USERNAME);
                }

                if ($rulename === self::RULE_MIN && strlen($value) < $rule['min']) {
                    $this->addErrorForRules($attr, self::RULE_MIN, $rule);
                }

                if ($rulename === self::RULE_MAX && strlen($value) > $rule['max']) {
                    $this->addErrorForRules($attr, self::RULE_MAX, $rule);
                }

                if ($rulename === self::RULE_MATCH && $value !== $this->{$rule['match']}) {
                    $this->addErrorForRules($attr, self::RULE_MATCH, $rule);
                }

                if ($rulename === self::RULE_UNIQUE) {
                    $className = $rule['class'];
                    $uniqueAttr = $rule['attribute'] ?? $attr;

                    $tableName = $className::tableName();

                    $statement = Application::$app->db->prepare("SELECT * FROM $tableName WHERE $uniqueAttr = :attr");

                    $statement->bindValue(":attr", $value);

                    $statement->execute();

                    $record = $statement->fetchObject();

                    if ($record) {
                        $this->addErrorForRules($attr, self::RULE_UNIQUE, ['field' => $this->getLabel($attr)]);
                    }

                }
            }

            return empty($this->errors);
        }
    }

    public function hasError($attr)
    {
        return $this->errors[$attr] ?? false;
    }

    public function getFirstError($attr)
    {
        return $this->errors[$attr][0] ?? false;
    }

}