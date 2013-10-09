@extends('layouts.master')

@section('content')
<h1>{{$product->name}}</h1>
<h2>${{$product->price}}</h2>
<img src="{{$product->large_thumb_url}}">
<p>{{$product->description}}</p>
@stop