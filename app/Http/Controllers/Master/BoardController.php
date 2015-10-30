<?php

namespace employment_bank\Http\Controllers\Master;

use Illuminate\Http\Request;

use employment_bank\Http\Requests;
use employment_bank\Http\Controllers\Controller;
use Validator;
use employment_bank\Models\Board;
use Illuminate\Database\QueryException;
use Kris\LaravelFormBuilder\FormBuilder;
use Redirect;

class BoardController extends Controller{

        private $content  = 'admin.master.boards.';
        private $route    = 'master.boards.';

        public function index(){

            $results = Board::paginate(20);
            return view($this->content.'index', compact('results'));
        }

        public function create(FormBuilder $formBuilder){

       		    $form = $formBuilder->create('employment_bank\Forms\BoardForm', [
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

            $validator = Validator::make($data = $request->all(), Board::$rules);
      		  if ($validator->fails())
              return Redirect::back()->withErrors($validator)->withInput();

      		  Board::create($data);
            return Redirect::route($this->route.'index')->with('message', 'New University / Board  has been Added!');
        }
          /**
           * Show the form for editing the specified resource.
           *
           * @param  int  $id
           * @return Response
           */
          public function edit($id, FormBuilder $formBuilder){

       		    $result  = Board::findOrFail($id);
       		    $form    = $formBuilder->create('employment_bank\Forms\BoardForm', [
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

            $model = Board::findOrFail($id);
            $rules = str_replace(':id', $id, Board::$rules);
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
              Board::destroy($id);
            }catch(QueryException $ex){
              return Redirect::back()->with('alert-warning', 'Board is in Use!');
            }

            return Redirect::route($this->route.'index')->with('alert-success', 'Successfully Deleted!');
        }
}
