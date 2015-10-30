<?php

namespace employment_bank\Http\Controllers\Master;

use Illuminate\Http\Request;

use employment_bank\Http\Requests;
use employment_bank\Http\Controllers\Controller;

use Validator;
use employment_bank\Models\Caste;
use Illuminate\Database\QueryException;
use Kris\LaravelFormBuilder\FormBuilder;
use Redirect;

class CasteController extends Controller{

      private $content  = 'admin.master.casts.';
      private $route    = 'master.casts.';

      public function index(){

          $results = Caste::paginate(20);
          return view($this->content.'index', compact('results'));
      }

      public function create(FormBuilder $formBuilder){

            $form = $formBuilder->create('employment_bank\Forms\CasteForm', [
                 'method' => 'POST',
                 'url' => route($this->route.'store')
            ])->remove('update');

            return view($this->content.'create', compact('form'));
      }

      public function store(Request $request){

          $validator = Validator::make($data = $request->all(), Caste::$rules);
          if ($validator->fails())
            return Redirect::back()->withErrors($validator)->withInput();

          Caste::create($data);
          return Redirect::route($this->route.'index')->with('message', 'New Caste  has been Added!');
      }

      public function edit($id, FormBuilder $formBuilder){

            $result  = Caste::findOrFail($id);
            $form    = $formBuilder->create('employment_bank\Forms\CasteForm', [
                 'method' => 'PUT',
                 'model' => $result,
                 'url' => route($this->route.'update', $id)
            ])->remove('save');
            return view($this->content.'edit', compact('form'));
      }

      public function update(Request $request, $id){

          $model = Caste::findOrFail($id);
          $rules = str_replace(':id', $id, Caste::$rules);
          $validator = Validator::make($data = $request->all(), $rules);
          if ($validator->fails())
            return Redirect::back()->withErrors($validator)->withInput();

          $model->update($data);

          return Redirect::route($this->route.'index')->with('alert-success', 'Data has been Updated!');
      }

      public function destroy($id){

          try{
            Caste::destroy($id);
          }catch(QueryException $ex){
            return Redirect::back()->with('alert-warning', 'Caste is in Use!');
          }
          return Redirect::route($this->route.'index')->with('alert-success', 'Successfully Deleted!');
      }
}
