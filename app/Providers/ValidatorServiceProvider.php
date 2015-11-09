<?php namespace employment_bank\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class ValidatorServiceProvider extends ServiceProvider {

    public function boot(){

        Validator::extend('alpha_spaces', function($attribute, $value, $parameters) {
            if ( preg_match('/\s/',$value) ){
                return false;
            }else{
                return true;
            }
        });

        Validator::extend('greater_than_field', function($attribute, $value, $parameters, $validator) {
          $min_field = $parameters[0];
          $data = $validator->getData();
          $min_value = $data[$min_field];
          return $value >= $min_value;
        });   

        Validator::replacer('greater_than_field', function($message, $attribute, $rule, $parameters) {
            // :other
            // $parameters[0] = $this->getAttribute($parameters[0]);
            // $parameters[1] = $this->getAttribute($parameters[0]);
            // return str_replace([':field', ':other'], $parameters, $message);
            return str_replace(':field', $parameters[0], $message);
        });
    }

    public function register()
    {
        //
    }
}
