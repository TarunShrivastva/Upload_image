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
      {!! Form::open( ['route'=>['authors.update', $author['id']], 'files' => true , 'method'=>'put']) !!}
        <div class="form-group">
          {!! Form::label('author', 'Author Name') !!}
          {!! Form::text('author', old('author',$author['author']), ['class' => 'form-control', 'placeholder' => 'Author Name']) !!}
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
          {!! Form::text('author_email', old('author_email',$author['author_email']), ['class' => 'form-control', 'placeholder' => 'Author Email']) !!}
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
          {!! Form::textArea('address', old('address',$author['address']), ['class' => 'form-control ckeditor', 'placeholder' => 'Address Put Here']) !!}
        </div>
        <div class="form-group">
          @if ($errors->has('address'))
            <span class="alert alert-danger">
              <strong>{{ $errors->first('address') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group">
          <img src="{{ URL::to('/')}}/uploads/{{ $author['image'] }}" width="100px">
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
          {!! Form::select('status',  array(0=>'Deactive', 1 =>'Active'), array(old('status'),$author['status']), array('class' => 'form-control') ) !!}
        </div>
        <div class="form-group">
          @if ($errors->has('status'))
            <span class="alert alert-danger">
              <strong>{{ $errors->first('status') }}</strong>
            </span>
          @endif
        </div>
        {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
          <a href="{{ route('authors.index') }}" class="btn btn-danger">Back To Previous Page</a>
        {!! Form::close() !!}
    </div>
  </div>         
@endsection
{{-- {{ URL::previous() }} --}}