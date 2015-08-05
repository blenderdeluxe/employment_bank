<?php

namespace employment_bank\Http\Controllers\Master;

use Illuminate\Http\Request;

use employment_bank\Http\Requests;
use employment_bank\Http\Controllers\Controller;
use Validator;
use employment_bank\Models\Language;
use Illuminate\Database\QueryException;
use Kris\LaravelFormBuilder\FormBuilder;
use Redirect;

class LanguagesController extends Controller{

        private $content  = 'admin.master.languages.';
        private $route    = 'master.languages.';

        public function index(){

            $results = Language::paginate(20);
            return view($this->content.'index', compact('results'));
        }

        public function create(FormBuilder $formBuilder){

       		    $form = $formBuilder->create('employment_bank\Forms\LanguageForm', [
                   'method' => 'POST',
                   'url' => route($this->route.'store')
              ])->remove('update');

              return view($this->content.'create', compact('form'));
       	}
          /**
           * Store a newly created resource in storage.
           *
           * @param  Request  $request
           * @return Response
           */
          public function store(Request $request){

            $validator = Validator::make($data = $request->all(), Language::$rules);
      		  if ($validator->fails())
              return Redirect::back()->withErrors($validator)->withInput();

      		  Language::create($data);
            return Redirect::route($this->route.'index')->with('message', 'New Language has been Added!');
          }

          /**
           * Display the specified resource.
           *
           * @param  int  $id
           * @return Response
           */
          public function show($id)
          {
              //
          }

          /**
           * Show the form for editing the specified resource.
           *
           * @param  int  $id
           * @return Response
           */
           public function edit($id, FormBuilder $formBuilder){

       		    $result  = Language::findOrFail($id);
       		    $form    = $formBuilder->create('employment_bank\Forms\LanguageForm', [
       			       'method' => 'PUT',
                   'model' => $result,
                   'url' => route($this->route.'update', $id)
              ])->remove('save');
       		    return view($this->content.'edit', compact('form'));
       	  }

          /**
           * Update the specified resource in storage.
           *
           * @param  Request  $request
           * @param  int  $id
           * @return Response
           */
          public function update(Request $request, $id){

            $model = Language::findOrFail($id);
            $rules = str_replace(':id', $id, Language::$rules);
            $validator = Validator::make($data = $request->all(), $rules);
            if ($validator->fails())
              return Redirect::back()->withErrors($validator)->withInput();

            $model->update($data);

            return Redirect::route($this->route.'index')->with('alert-success', 'Data has been Updated!');
          }

          /**
           * Remove the specified resource from storage.
           *
           * @param  int  $id
           * @return Response
           */
          public function destroy($id){

            try{
              Language::destroy($id);
            }catch(QueryException $ex){
              return Redirect::back()->with('alert-warning', 'Language is in Use!');
            }

            return Redirect::route($this->route.'index')->with('alert-success', 'Successfully Deleted!');

          }
}
