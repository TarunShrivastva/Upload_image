@extends('layouts.mainadmin')
@section('content')
     <!-- Website Overview -->
            <div class="panel panel-default" >
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">{{ $title }}</h3>
              </div>
              
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                      <input class="form-control" type="text" placeholder="Filter Users...">
                  </div>
                </div>
              </div>  
              <div class="panel-body table-slide" style="overflow-x:auto;">
                <table class="table table-striped table-hover">
                  <tr>
                    <th>s.no.</th>
                    <th>title</th>
                    <th>description</th>
                    <th>author</th>
                    <th>status</th>
                    <th>created</th>
                    <th>updated</th>
                    <th>Edit</th>
                    <th>delete</th>
                  </tr>
                  @foreach($articles as $key => $data)
                  <tr>
                    <th>{{ $key + 1 }}</th>
                    <th>{{ $data->title }}</th>
                    <th>{{ str_limit(strip_tags($data->description),50) }}</th>
                    <th>{{ $data->author }}</th>
                    <th>{{ $data->status }}</th>
                    <th>{{ $data->created_at }}</th>
                    <th>{{ $data->updated_at }}</th>
                    <th><a class="btn btn-primary" href="{{ route('articles.edit', $data->id) }}">Edit</a></th>
                    {{ Form::open(array('route' => array('articles.destroy', $data->id), 'method' => 'delete')) }}
                      {!! Form::token() !!}
                    <th>{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}</th> 
                    {{ Form::close() }}
                  </tr>
                  @endforeach
              </table>
              </div>
              </div>
@endsection