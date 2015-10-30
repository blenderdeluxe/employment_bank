<?php namespace employment_bank\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider {

    public function boot(){

      Form::macro('selectYears', function($name, $begin, $end, $selected = null, $options = array()){
        $selectYear = preg_replace('/></', '><option value="">-Choose-</option><', Form::selectYear($name, $begin, $end, $selected, $options), 1);
        return $selectYear;
      });
    }

    public function register(){
        //
    }
}
