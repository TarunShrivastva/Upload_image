@extends('layouts.mainadmin')
@section('content')
  <!-- Website Overview -->
  <div class="panel panel-default">
    <div class="panel-heading main-color-bg">
      <h3 class="panel-title">Create {{ $title }}</h3>
    </div>
    <div class="panel-body">
      {!! Form::open( ['route'=>['articles.update', $article['id']], 'files' => true , 'method'=>'put']) !!}
        {{-- {!! Form::token() !!} --}}
        <div class="form-group">
          {!! Form::label('title', 'Title Name') !!}
          {!! Form::text('title', old('title',$article['title']), ['class' => 'form-control', 'placeholder' => 'Title Name']) !!}
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
          {!! Form::textArea('description', old('description',$article['description']), ['class' => 'form-control ckeditor', 'placeholder' => 'Description Put Here']) !!}
        </div>
        <div class="form-group">
          @if ($errors->has('description'))
            <span class="alert alert-danger">
              <strong>{{ $errors->first('description') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group">
          {!! Form::label('author_id', 'Author') !!}
          {!! Form::text('author_id', old('author_id',$article['author_id']), ['class' => 'form-control', 'placeholder' => 'Author For Article']) !!}
        </div>
        <div class="form-group">
        @if ($errors->has('author_id'))
          <span class="alert alert-danger">
            <strong>{{ $errors->first('author_id') }}</strong>
          </span>
        @endif
        </div>
        
        <div class="form-group">
          <img src="{{ URL::to('/')}}/uploads/{{ $article['image'] }}" width="100px">
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
          {!! Form::select('status',  array(0=>'Deactive', 1 =>'Active'), array(old('status'),$article['status']), array('class' => 'form-control') ) !!}
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
          {!! Form::select('content_type',  $contentName, array(old('content_type'),$article['content_type']), array('class' => 'form-control') ) !!}
        </div>
        <div class="form-group">
          @if ($errors->has('content_type'))
            <span class="alert alert-danger">
              <strong>{{ $errors->first('content_type') }}</strong>
            </span>
          @endif
        </div>
        {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
          <a href="{{ route('articles.index') }}" class="btn btn-danger">Back To Previous Page</a>
        {!! Form::close() !!}
    </div>
  </div>         
@endsection
{{-- {{ URL::previous() }} --}}