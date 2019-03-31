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
                    <th>title</th>
                    <th>description</th>
                    <th>author</th>
                    <th>image</th>
                    <th>status</th>
                    <th>created</th>
                    <th>updated</th>
                    <th>Edit</th>
                    <th>delete</th>
                    <th>Recent</th>
                    <th>Trending</th>
                    <th>Most Popular</th>
                    <th>Published</th>
                  </tr>
                  @foreach($articles as $key => $data)
                  <tr>
                    <th>{{ $key + 1 }}</th>
                    <th>{{ $data->title }}</th>
                    <th>{{ str_limit(strip_tags($data->description),50) }}</th>
                    <th>{{ $data->author_id }}</th>
                    <th><img src="{{ URL::to('/')}}/uploads/{{ $data->image }}" width="100px"></th>
                    <th><a class="{{($data->status == 1)?'btn btn-success':'btn btn-danger'}}" id="status_{{ $data->id }}" onclick="statusUpdate({{ $data->id }}, 'status',{{ $data->status }})">{{($data->status == 1)?'yes':'no'}}</a></th>
                    <th>{{ $data->created_at }}</th>
                    <th>{{ $data->updated_at }}</th>
                    <th><a class="btn btn-primary" href="{{ route('articles.edit', $data->id) }}">Edit</a></th>
                    {{ Form::open(array('route' => array('articles.destroy', $data->id), 'method' => 'delete')) }}
                      {!! Form::token() !!}
                    <th>{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}</th>
                    {{ Form::close() }}
                    <th><a class="{{($data->recent == 1)?'btn btn-success':'btn btn-danger'}}" id="recent_{{ $data->id }}" onclick="statusUpdate({{ $data->id }}, 'recent',{{ $data->recent }},'Article')">{{($data->recent == 1)?'yes':'no'}}</a></th>
                    <th><a class="{{($data->trending == 1)?'btn btn-success':'btn btn-danger'}}" id="trending_{{ $data->id }}" onclick="statusUpdate({{ $data->id }}, 'trending',{{ $data->trending }})">{{($data->trending == 1)?'yes':'no'}}</a></th>
                    <th><a class="{{($data->popular == 1)?'btn btn-success':'btn btn-danger'}}" id="popular_{{ $data->id }}" onclick="statusUpdate({{ $data->id }}, 'popular',{{ $data->popular }})">{{($data->popular == 1)?'yes':'no'}}</a></th>
                    <th><a class="{{($data->published == 1)?'btn btn-success':'btn btn-danger'}}" id="published_{{ $data->id }}" onclick="statusUpdate({{ $data->id }}, 'published',{{ $data->published }})">{{($data->published == 1)?'yes':'no'}}</a></th>
                  </tr>
                  @endforeach
              </table>
              </div>
                <nav>
                  <ul class="pagination justify-content-end">
                    {{$articles->links('vendor.pagination.bootstrap-4')}}
                  </ul>
                </nav>
              </div>
@endsection