@extends('layouts.mainadmin')
@section('pageform')
@endsection

@section('content')
  <!-- Website Overview -->
  <div class="panel panel-default">
    <div class="panel-heading main-color-bg">
      <h3 class="panel-title">Create {{ $title }}</h3>
    </div>
  <div class="tab">
  <button class="tablinks active" onclick="openCity(event, 'general')">General</button>
  <button class="tablinks" onclick="openCity(event, 'meta')">Meta</button>
 </div>
    <div class="creat-btn">
      <button class="btn btn-default" type="button">
        <a href="{{url('/')}}/{{ $custom_cat }}/create">Add New </a>
      </button>
    </div>
  <div id="general" class="tabcontent" style="display: block;">  
    <div class="panel-body">
      {!! Form::open(['route' => 'category.store']) !!}
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
          {!! Form::select('parent_id',  $catName, array(old('parent_id')), array('class' => 'form-control') ) !!}
        </div>
        <div class="form-group">
          @if ($errors->has('parent_id'))
            <span class="alert alert-danger">
              <strong>{{ $errors->first('parent_id') }}</strong>
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
        <a href="{{ route('category.index') }}" class="btn btn-danger">Back To Previous Page</a>
      {!! Form::close() !!}  
    </div>
  </div> 
  <div id="meta" class="tabcontent">
    <h3>Paris</h3>
    <p>Paris is the capital of France.</p> 
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