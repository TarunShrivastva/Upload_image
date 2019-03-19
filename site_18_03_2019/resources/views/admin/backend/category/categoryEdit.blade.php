@extends('layouts.mainadmin')
@section('content')
  <!-- Website Overview -->
  <div class="panel panel-default">
    <div class="panel-heading main-color-bg">
      <h3 class="panel-title">Create {{ $title }}</h3>
    </div>
    <div class="panel-body">
      {!! Form::open( ['route'=>['category.update', $module['id']], 'method'=>'put']) !!}
        {!! Form::token() !!}
        <div class="form-group">
          {!! Form::label('category', 'Category Name') !!}
          {!! Form::text('name', old('display',$module['name']), ['class' => 'form-control', 'placeholder' => 'Category For Nav Bar']) !!}
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
          {!! Form::text('display', old('display',$module['display']), ['class' => 'form-control', 'placeholder' => 'Name For Display']) !!}
        </div>
        <div class="form-group">
          @if ($errors->has('display'))
            <span class="alert alert-danger">
              <strong>{{ $errors->first('display') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group">
          {!! Form::label('url', 'URL') !!}
          {!! Form::text('url', old('url',$module['url']), ['class' => 'form-control', 'placeholder' => 'Url For Category']) !!}
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
          {!! Form::text('icon', old('icon',$module['icon']), ['class' => 'form-control', 'placeholder' => 'Icon For Category']) !!}
        </div>
        <div class="form-group">
        @if ($errors->has('icon'))
          <span class="alert alert-danger">
            <strong>{{ $errors->first('icon') }}</strong>
          </span>
        @endif
        </div>
        <div class="form-group">
          {!! Form::select('parent_id', $catName, array($module['parent_id'],old('parent_id')), array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
          @if ($errors->has('parent_id'))
            <span class="alert alert-danger">
              <strong>{{ $errors->first('parent_id') }}</strong>
            </span>
          @endif
        </div>
        {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
      {!! Form::close() !!}  
    </div>
  </div>         
@endsection