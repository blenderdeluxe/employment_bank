<?php

namespace employment_bank\Http\Controllers\Master;

use Illuminate\Http\Request;

use employment_bank\Http\Requests;
use employment_bank\Http\Controllers\Controller;

use Validator;
use employment_bank\Models\State;
use Illuminate\Database\QueryException;
use Kris\LaravelFormBuilder\FormBuilder;
use Redirect;


class StateController extends Controller{

    private $content  = 'admin.master.states.';
    private $route    = 'master.states.';

    public function index(){

        $results = State::paginate(20);
        return view($this->content.'index', compact('results'));
    }

    public function create(FormBuilder $formBuilder){

          $form = $formBuilder->create('employment_bank\Forms\StateForm', [
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

        $validator = Validator::make($data = $request->all(), State::$rules);
        if ($validator->fails())
          return Redirect::back()->withErrors($validator)->withInput();

        State::create($data);
        return Redirect::route($this->route.'index')->with('message', 'New State  has been Added!');
    }
      /**
       * Show the form for editing the specified resource.
       *
       * @param  int  $id
       * @return Response
       */
      public function edit($id, FormBuilder $formBuilder){

          $result  = State::findOrFail($id);
          $form    = $formBuilder->create('employment_bank\Forms\StateForm', [
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

        $model = State::findOrFail($id);
        $rules = str_replace(':id', $id, State::$rules);
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
          State::destroy($id);
        }catch(QueryException $ex){
          return Redirect::back()->with('alert-warning', 'State is in Use!');
        }

        return Redirect::route($this->route.'index')->with('alert-success', 'Successfully Deleted!');
    }
}
