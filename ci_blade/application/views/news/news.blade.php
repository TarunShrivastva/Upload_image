@extends('layouts.default')

@section('content')
	<h1>{{$title}}</h1>
	@foreach ($list as $obj)
	    <div class="container">
	    	<div row="col-md-3">
			    <span>
		        	<h4>{{ $obj->name }}</h4>
			    </span>
			</div>
	    </div>
	@endforeach
@endsection
