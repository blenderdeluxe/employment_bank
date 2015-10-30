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
    }

    public function register()
    {
        //
    }
}
