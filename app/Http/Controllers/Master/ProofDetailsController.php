<?php

namespace employment_bank\Http\Controllers\Master;

use Illuminate\Http\Request;

use employment_bank\Http\Requests;
use employment_bank\Http\Controllers\Controller;

use Validator;
use employment_bank\Models\MasterProof;
use Illuminate\Database\QueryException;
use Kris\LaravelFormBuilder\FormBuilder;
use Redirect;

class ProofDetailsController extends Controller{

      private $content  = 'admin.master.proof_details.';
      private $route    = 'master.proof_details.';

      public function index(){

          $results = MasterProof::paginate(20);
          return view($this->content.'index', compact('results'));
      }

      public function create(FormBuilder $formBuilder){

            $form = $formBuilder->create('employment_bank\Forms\MasterProofForm', [
                 'method' => 'POST',
                 'url' => route($this->route.'store')
            ])->remove('update');

            return view($this->content.'create', compact('form'));
      }

      public function store(Request $request){

          $validator = Validator::make($data = $request->all(), MasterProof::$rules);
          if ($validator->fails())
            return Redirect::back()->withErrors($validator)->withInput();

          MasterProof::create($data);
          return Redirect::route($this->route.'index')->with('message', 'New Proof Details  has been Added!');
      }

      public function edit($id, FormBuilder $formBuilder){

          $result  = MasterProof::findOrFail($id);
          $form    = $formBuilder->create('employment_bank\Forms\MasterProofForm', [
               'method' => 'PUT',
               'model' => $result,
               'url' => route($this->route.'update', $id)
          ])->remove('save');
          return view($this->content.'edit', compact('form'));
      }

      public function update(Request $request, $id){

          $model = MasterProof::findOrFail($id);
          $rules = str_replace(':id', $id, MasterProof::$rules);
          $rules = str_replace(':id', $id, $rules);
          $validator = Validator::make($data = $request->all(), $rules);
          if ($validator->fails())
            return Redirect::back()->withErrors($validator)->withInput();

          $model->update($data);

          return Redirect::route($this->route.'index')->with('alert-success', 'Data has been Updated!');
      }

      public function destroy($id){

          try{
            MasterProof::destroy($id);
          }catch(QueryException $ex){
            return Redirect::back()->with('alert-warning', 'Proof is in Use!');
          }

          return Redirect::route($this->route.'index')->with('alert-success', 'Successfully Deleted!');
      }
}
