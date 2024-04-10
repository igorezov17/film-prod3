<?php

namespace Kernel\Validator;

class Validator
{

    private $data;

    private $errors = [];

    public function validate(array $data, array $rules)
    {

        $this->data = $data;

        $this->errors = [];

        foreach($rules as $key => $rule) {

            $rules = $rule;

            foreach($rules as $rule) {
                $rule = explode(':', $rule);



                $ruleName  = $rule[0];
                $ruleValue = $rule[1] ?? null;

                $error = $this->ruleValidate($key, $ruleName, $ruleValue);

                if (!empty($error)) {
                    $this->errors[$key][] = $error;
                }
                // $this->errors[$key][] = $this->ruleValidate($key, $ruleName, $ruleValue);
            }

        }

        return !empty($this->errors);
    }

    public function getErrors()
    {
        return $this->errors ?? null;
    }

    private function ruleValidate(string $key, string $ruleName, string $ruleValue = null)
    {

        $value = $this->data[$key];

        switch ($ruleName) {
            case 'required': {
                if (empty($value)) {
                    return "Field $key must be required";
                }
            } break;
            case 'min': {
                if (strlen($value) < $ruleValue) {
                    return "Field $key must be at least {$ruleValue} characters long";
                }
            } break;
            case 'max': {
                if (strlen($value) > $ruleValue) {
                    return "Field $key must be at most {$ruleValue} characters long";
                }
            } break;
            case 'email': {
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    return "Field $key must be a valid email address";
                }
            } break;
        }

        return false;
    }
}