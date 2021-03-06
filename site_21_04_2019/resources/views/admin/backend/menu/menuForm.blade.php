@extends('layouts.mainadmin')
@section('pageform')
@endsection

@section('content')
  <!-- Website Overview -->
  <div class="panel panel-default">
    <div class="panel-heading main-color-bg">
      <h3 class="panel-title">Create {{ $title }}</h3>
    </div>
    <div class="creat-btn">
      <button class="btn btn-default" type="button">
        <a href="{{url('/')}}/{{ $custom_cat }}/create">Add New </a>
      </button>
    </div>
    <div class="panel-body">
      {!! Form::open(['route' => 'front-module.store']) !!}
        {!! Form::token() !!}
        <div class="form-group">
          {!! Form::label('category', 'Category Name') !!}
          {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Category For Nav Bar', 'autocomplete'=> 'off']) !!}
        </div>
        <div class="form-group">
        @if ($errors->has('name'))
          <span class="alert alert-danger">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
        @endif
        </div>
        <div class="form-group">
          {!! Form::label('display', 'Display Name') !!}
          {!! Form::text('display', old('display_name'), ['class' => 'form-control', 'placeholder' => 'Name For Display', 'autocomplete'=> 'off']) !!}
        </div>
        <div class="form-group">
          @if ($errors->has('display_name'))
            <span class="alert alert-danger">
              <strong>{{ $errors->first('display_name') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group">
          {!! Form::label('url', 'URL Alias') !!}
          {!! Form::text('url', old('url'), ['class' => 'form-control', 'placeholder' => 'Url For Category', 'autocomplete'=> 'off']) !!}
        </div>
        <div class="form-group">
        @if ($errors->has('url'))
          <span class="alert alert-danger">
            <strong>{{ $errors->first('url') }}</strong>
          </span>
        @endif
        </div>
        <div class="form-group">
          {!! Form::label('icon', 'Icon') !!}
          {!! Form::text('icon', old('icon'), ['class' => 'form-control', 'placeholder' => 'Icon For Category', 'autocomplete'=> 'off']) !!}
        </div>
        <div class="form-group">
        @if ($errors->has('icon'))
          <span class="alert alert-danger">
            <strong>{{ $errors->first('icon') }}</strong>
          </span>
        @endif
        </div>
        <div class="form-group">
          {!! Form::label('select category', 'Select Category') !!}
          {!! Form::select('category_id',  $catName, array(old('category_id')), array('class' => 'form-control') ) !!}
        </div>
        <div class="form-group">
          @if ($errors->has('category_id'))
            <span class="alert alert-danger">
              <strong>{{ $errors->first('category_id') }}</strong>
            </span>
          @endif
        </div>
        {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
        <a href="{{ route('front-module.index') }}" class="btn btn-danger">Back To Previous Page</a>
      {!! Form::close() !!}  
    </div>
  </div>         
@endsection