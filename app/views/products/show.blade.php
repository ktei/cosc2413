@extends('layouts.master')

@section('content')
<h1>{{$product->name}}</h1>
<ul class="pager">
  <li class="previous"><a href="{{URL::action('ProductsController@index')}}">&larr; Products</a></li>
</ul>
<h2>${{$product->price}}</h2>
<img src="{{$product->large_thumb_url}}">
<p>{{$product->description}}</p>
{{ Form::open(array('action' => 'CartController@add')) }}
    <input type="hidden" value="{{$product->code}}" name="code">
    <button type="submit" class="btn btn-lg btn-primary pull-right">Add to cart</button>
{{ Form::close() }}
@stop