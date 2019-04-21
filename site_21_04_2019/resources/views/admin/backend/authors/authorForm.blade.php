@extends('layouts.mainadmin')
@section('content')
  <!-- Website Overview -->
  <div class="panel panel-default">
    <div class="panel-heading main-color-bg">
      <h3 class="panel-title">Create {{ $title }}</h3>
    </div>

<div class="tab">
  <button class="tablinks active" onclick="openCity(event, 'author')">Author Info</button>
</div>
<div class="creat-btn">
      <button class="btn btn-default" type="button">
        <a href="{{url('/')}}/{{ $custom_cat }}/create">Add New </a>
      </button>
    </div>
<div id="author" class="tabcontent" style="display: block;">
  <div class="panel-body">
      {!! Form::open(['route' => 'authors.store', 'files' => true]) !!}
        {{-- {!! Form::token() !!} --}}
        <div class="form-group">
          {!! Form::label('author', 'Author') !!}
          {!! Form::text('author', old('author'), ['class' => 'form-control', 'placeholder' => 'Author Name', 'autocomplete'=> 'off']) !!}
        </div>
        <div class="form-group">
        @if ($errors->has('author'))
          <span class="alert alert-danger">
            <strong>{{ $errors->first('author') }}</strong>
          </span>
        @endif
        </div>
        <div class="form-group">
          {!! Form::label('author_email', 'Author Email') !!}
          {!! Form::text('author_email', old('author_email'), ['class' => 'form-control', 'placeholder' => 'Author Email', 'autocomplete'=> 'off']) !!}
        </div>
        <div class="form-group">
        @if ($errors->has('author_email'))
          <span class="alert alert-danger">
            <strong>{{ $errors->first('author_email') }}</strong>
          </span>
        @endif
        </div>
        <div class="form-group">
          {!! Form::label('address', 'Address') !!}
          {!! Form::textarea('address', old('address'), ['class' => 'form-control', 'placeholder' => 'Address Put Here']) !!}
        </div>
        <div class="form-group">
          @if ($errors->has('address'))
            <span class="alert alert-danger">
              <strong>{{ $errors->first('address') }}</strong>
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
        {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
          <a href="{{ route('authors.index') }}" class="btn btn-danger">Back To Previous Page</a>
      {!! Form::close() !!}  
    </div>
  </div>
</div>
@endsection