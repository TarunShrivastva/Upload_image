@extends('layouts.mainadmin')
@section('content')
     <!-- Website Overview -->
            <div class="panel panel-default" >
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">{{ $title }}</h3>
              </div>
              <div class="creat-btn">
                <button class="btn btn-default" type="button">
                  <a href="{{url('/')}}/{{ $custom_cat }}/create">Add New </a>
                </button>
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
                        <th>category</th>
                        <th>url</th>
                        <th>parent</th>
                        <th>icon</th>
                        <th>status</th>
                        <th>created</th>
                        <th>updated</th>
                        <th>Edit</th>
                        <th>delete</th>
                      </tr>
                      @foreach($category as $key => $data)
                      <tr>
                        <th>{{ $key + 1 }}</th>
                        <th>{{ $data->name }}</th>
                        <th>{{ $data->url }}</th>
                        <th>{{ $data->parent_id }}</th>
                        <th>{{ $data->icon }}</th>
                        <th><a class="{{($data->status == 1)?'btn btn-success':'btn btn-danger'}}" id="status_{{ $data->id }}" onclick="statusUpdate({{ $data->id }}, 'status',{{ $data->status }},'Category')">{{($data->status == 1)?'yes':'no'}}</a></th>
                        <th>{{ $data->created_at }}</th>
                        <th>{{ $data->updated_at }}</th>
                        <th><a class="btn btn-primary" href="{{ route('category.edit', $data->id) }}">Edit</a></th>
                        {{ Form::open(array('route' => array('category.destroy', $data->id), 'method' => 'delete')) }}
                          {!! Form::token() !!}
                        <th>{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}</th> 
                        {{ Form::close() }}
                      </tr>
                      @endforeach
                      
                    </table>
              </div>
              </div>
@endsection