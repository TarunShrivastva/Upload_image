@extends('layouts.mainadmin')
@section('pageform')
@endsection

@section('content')
  <!-- Website Overview -->
  <div class="panel panel-default">
    <div class="panel-heading main-color-bg">
      <h3 class="panel-title">Create {{ $title }}</h3>
    </div>
    <div class="panel-body">
      {!! Form::open(['route' => 'category.store']) !!}
        {!! Form::token() !!}
        <div class="form-group">
          {!! Form::label('category', 'Category Name') !!}
          {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Category For Nav Bar']) !!}
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
          {!! Form::text('display', old('display_name'), ['class' => 'form-control', 'placeholder' => 'Name For Display']) !!}
        </div>
        <div class="form-group">
          @if ($errors->has('display_name'))
            <span class="alert alert-danger">
              <strong>{{ $errors->first('display_name') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group">
          {!! Form::label('url', 'URL') !!}
          {!! Form::text('url', old('url'), ['class' => 'form-control', 'placeholder' => 'Url For Category']) !!}
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
          {!! Form::text('icon', old('icon'), ['class' => 'form-control', 'placeholder' => 'Icon For Category']) !!}
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
          {!! Form::select('parent_id',  $catName, array(old('parent_id')), array('class' => 'form-control') ) !!}
        </div>
        <div class="form-group">
          @if ($errors->has('parent_id'))
            <span class="alert alert-danger">
              <strong>{{ $errors->first('parent_id') }}</strong>
            </span>
          @endif
        </div>
        {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}
      {!! Form::close() !!}  
    </div>
  </div>         
@endsection
{{-- 
  <div class="form-group">
    {!! Form::textarea('msg', null, ['class' => 'form-control']) !!}
  </div> 
  <div class="form-group">
    {!! Form::label('email', 'E-mail Address') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
  </div>
  {!! Form::select('parent_artilce', array('Add1' => 'Add', 'Find/Replace' => 'Find/Replace'), null, array('class' => 'form-control')) !!} 

  @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
  @endif

--}}