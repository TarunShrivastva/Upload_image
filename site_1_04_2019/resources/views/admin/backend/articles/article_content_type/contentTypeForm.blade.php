@extends('layouts.mainadmin')
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
      {!! Form::open(['route' => 'contenttype.store']) !!}
        {{-- {!! Form::token() !!} --}}
        <div class="form-group">
          {!! Form::label('content_type_name', 'Content Type Name') !!}
          {!! Form::text('content_type_name', old('content_type_name'), ['class' => 'form-control', 'placeholder' => 'Content Type Name']) !!}
        </div>
        <div class="form-group">
        @if ($errors->has('content_type_name'))
          <span class="alert alert-danger">
            <strong>{{ $errors->first('content_type_name') }}</strong>
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
        {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}
      {!! Form::close() !!}  
    </div>
  </div>         
@endsection