<?php namespace employment_bank\Forms;

use Kris\LaravelFormBuilder\Form;

class AdminLoginForm extends Form{

    public function buildForm(){

      $this->add('email', 'email', [
          'attr' => ['required', 'maxlength' => '255', 'placeholder'=> 'Email'],
          'wrapper' => ['class' => 'form-group has-feedback'] // Shows the wrapper for each e
      ]);

      $this->add('save', 'submit', [
          'attr' => ['class'=>'btn btn-lg btn-primary col-md-12']
      ]);
        <div class="form-group has-feedback">
          <input type="email" class="form-control" placeholder="Email" />
          {!! Form::text('username', '', array('class' => 'form-control', 'placeholder' => 'User Name', 'required', 'autocomplete'=>'off')) }}
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" />
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
          </div><!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div><!-- /.col -->
        </div>
      {!! Form::close() !!}

    }
}
