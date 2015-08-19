<?php
namespace employment_bank\Http\Controllers\Master;

use Illuminate\Http\Request;

use employment_bank\Http\Requests;
use employment_bank\Http\Controllers\Controller;

use Validator;
use employment_bank\Models\District;
use Illuminate\Database\QueryException;
use Kris\LaravelFormBuilder\FormBuilder;
use Redirect;

class DistrictController extends Controller{

    private $content  = 'admin.master.districts.';
    private $route    = 'master.districts.';

    public function index(){

        $results = District::paginate(20);
        return view($this->content.'index', compact('results'));
    }

    public function create(FormBuilder $formBuilder){

          $form = $formBuilder->create('employment_bank\Forms\DistrictForm', [
               'method' => 'POST',
               'url' => route($this->route.'store')
          ])->remove('update');
          
          return view($this->content.'create', compact('form'));
    }

    public function store(Request $request){

        $validator = Validator::make($data = $request->all(), District::$rules);
        if ($validator->fails())
          return Redirect::back()->withErrors($validator)->withInput();

        District::create($data);
        return Redirect::route($this->route.'index')->with('message', 'New District  has been Added!');
    }

    public function edit($id, FormBuilder $formBuilder){

          $result  = District::findOrFail($id);
          $form    = $formBuilder->create('employment_bank\Forms\DistrictForm', [
               'method' => 'PUT',
               'model' => $result,
               'url' => route($this->route.'update', $id)
          ])->remove('save');
          return view($this->content.'edit', compact('form'));
    }

    public function update(Request $request, $id){

        $model = District::findOrFail($id);
        $rules = str_replace(':id', $id, District::$rules);
        $validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails())
          return Redirect::back()->withErrors($validator)->withInput();

        $model->update($data);

        return Redirect::route($this->route.'index')->with('alert-success', 'Data has been Updated!');
    }

    public function destroy($id){

        try{
          District::destroy($id);
        }catch(QueryException $ex){
          return Redirect::back()->with('alert-warning', 'District is in Use!');
        }

        return Redirect::route($this->route.'index')->with('alert-success', 'Successfully Deleted!');
    }
}
