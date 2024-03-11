<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class Uppercase implements Rule
{
    private $attribute = null;
    public function __construct()
    {
        
    }

    public function passes($attribute, $value){
        $this->attribute = $attribute;
        if ($value===mb_strtoupper($value, 'UTF-8')) {
            return true;
        }
        return false;
    }

    public function message(){
        // return 'Trường :attribute không hợp lệ';
        $customMessage = 'validation.custom.'.$this->attribute.'.uppercase';

        if (trans($customMessage)!=$customMessage) {
            return trans($customMessage);
        }
        return trans('validation.uppercase');
    }
}
