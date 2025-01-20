<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PassportRule implements Rule
{
    
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $split = preg_split('/\s+/', $value) ?? [];
        if(count($split) == 2)
        {
            if(in_array($split[0], \Helper::getPassportSeriaOptions()) && preg_match('/^[0-9]{6}$/', $split[1]))
                return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute is not valid.';
    }
}
