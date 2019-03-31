@extends('layouts.mainadmin')
@section('content')
  <!-- Website Overview -->
  <div class="panel panel-default">
    <div class="panel-heading main-color-bg">
      <h3 class="panel-title">Create {{ $title }}</h3>
    </div>

{{-- <div id="exTab2" class="container"> 
  <ul class="nav nav-tabs">
    <li class="active">
      <a  href="#1" data-toggle="tab">Overview</a>
    </li>
    <li>
      <a href="#2" data-toggle="tab">Without clearfix</a>
    </li>
    <li>
      <a href="#3" data-toggle="tab">Solution</a>
    </li>
  </ul>

  <div class="tab-content ">
    <div class="tab-pane active" id="1">
      <h3>Standard tab panel created on bootstrap using nav-tabs</h3>
    </div>
    <div class="tab-pane" id="2">
      <h3>Notice the gap between the content and tab after applying a background color</h3>
    </div>
    <div class="tab-pane" id="3">
      <h3>add clearfix to tab-content (see the css)</h3>
    </div>
  </div>
</div> --}}
<div class="tab">
  <button class="tablinks active" onclick="openCity(event, 'general')">General</button>
  <button class="tablinks" onclick="openCity(event, 'uploads')">Uploads</button>
  <button class="tablinks" onclick="openCity(event, 'prioritize')">Prioritize Pagination</button>
  <button class="tablinks" onclick="openCity(event, 'options')">Options</button>
</div>
  <div class="creat-btn">
    <button class="btn btn-default" type="button">
      <a href="{{url('/')}}/{{ $custom_cat }}/create">Add New </a>
    </button>
  </div>

<div id="general" class="tabcontent" style="display: block;">
  <div class="panel-body">
      {!! Form::open(['route' => 'articles.store', 'files' => true]) !!}
        {{-- {!! Form::token() !!} --}}
        <div class="form-group">
          {!! Form::label('title', 'Title') !!}
          {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Title Name', 'autocomplete'=> 'off']) !!}
        </div>
        <div class="form-group">
        @if ($errors->has('title'))
          <span class="alert alert-danger">
            <strong>{{ $errors->first('title') }}</strong>
          </span>
        @endif
        </div>
        <div class="form-group">
          {!! Form::label('description', 'Description') !!}
          {!! Form::textarea('description', old('description'), ['class' => 'form-control ckeditor', 'placeholder' => 'Description Put Here']) !!}
        </div>
        <div class="form-group">
          @if ($errors->has('description'))
            <span class="alert alert-danger">
              <strong>{{ $errors->first('description') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group">
          {!! Form::label('author_id', 'Select Author') !!}
          {!! Form::select('author_id',  $contentName3, old('author_id'), array('class' => 'form-control') ) !!}
        </div>
        <div class="form-group">
          @if ($errors->has('author_id'))
            <span class="alert alert-danger">
              <strong>{{ $errors->first('author_id') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group">
          {!! Form::label('image', 'Image Upload') !!}
          {!! Form::file('image', old('image')) !!}
        </div>
        <div class="form-group">
        @if ($errors->has('image'))
          <span class="alert alert-danger">
            <strong>{{ $errors->first('image') }}</strong>
          </span>
        @endif
        </div>

        <div class="form-group">
          {!! Form::label('status', 'Select Status') !!}
          {!! Form::select('status',  array(0=>'Deactive', 1 =>'Active'), array(old('status')), array('class' => 'form-control') ) !!}
        </div>
        <div class="form-group">
          @if ($errors->has('status'))
            <span class="alert alert-danger">
              <strong>{{ $errors->first('status') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group">
          {!! Form::label('select content type', 'Select Content Type') !!}
          {!! Form::select('content_type',  $contentName, array(old('content_type')), array('class' => 'form-control') ) !!}
        </div>
        <div class="form-group">
          @if ($errors->has('content_type'))
            <span class="alert alert-danger">
              <strong>{{ $errors->first('content_type') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group">
          {!! Form::label('select category', 'Select Category') !!}
          {!! Form::select('category',  $contentName2, array(old('category')), array('class' => 'form-control') ) !!}
        </div>
        <div class="form-group">
          @if ($errors->has('category'))
            <span class="alert alert-danger">
              <strong>{{ $errors->first('category') }}</strong>
            </span>
          @endif
        </div>
        {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
        <a href="{{ route('articles.index') }}" class="btn btn-danger">Back To Previous Page</a>
      {!! Form::close() !!}  
    </div>
  </div>
</div>

<div id="uploads" class="tabcontent">
  <h3>Paris</h3>
  <p>Paris is the capital of France.</p> 
</div>
<div id="prioritize" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>
<div id="options" class="tabcontent">
  <h3>Tokydasdasdo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>
             
@endsection