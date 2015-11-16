@extends('employer.layouts.default')

@section('page_header_custom')
<style>
.form-group-sm{
    margin-top:5px;
}
</style>
@stop
@section('content-header')
  List of uploaded documents <small> </small>
@endsection

@section('content')
<div class="row">
<div class="col-md-12">
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">List of Documents</h3>
  </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              @if($results->count())
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Type of Document</th>
                    <th>Description</th>
                    <th>Uploaded On</th>
                    <th> Action </th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($results as $result)
                  <tr>
                    <td><a href="{!! route('employer.documents_uploaded_view', $result->id) !!}"> {{$result->doc_type}}</a></td>
                    <td>{{$result->description}}</td>
                    <td> {{ $result->created_at->format('d-m-Y h:m:s a') }}</td>
                    <td> 
                    {!! Form::open(['method'=>'DELETE', 'route'=>['employer.documents_uploaded_delete', Hashids::encode($result->id)]]) !!}
                      <button type="submit" class="btn btn-danger btn-xs pull-left show_confirm">
                          <i class="fa fa-trash"></i>
                      </button>
                    {!! Form::close() !!}
                    </a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                @else
                  <p style="text-align: center;"> No records found.</p>
                @endif
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="{!! route('employer.documents_uploaded_form') !!}" class="btn btn-sm btn-info btn-flat pull-left">Upload a New Document</a>
            </div>
            <!-- /.box-footer -->
          </div>
</div>
</div>
@stop

@section('page_specific_js')

@stop

@section('page_specific_scripts')
     
@stop
