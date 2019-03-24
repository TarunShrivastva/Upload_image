@extends('layouts.default')

@section('content')
	<h2>{{$title}}</h2>

    <div class="main">
        {{$news_item->text}}
    </div>
    <p><a href="{{site_url('news/')}}">View News</a></p>
@stop
