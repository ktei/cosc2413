@extends('layouts.master')

@section('content')
<h1>Products</h1>

@if (!Auth::check())
<div class="alert alert-warning">
    In order to make any purchase, please <a href="{{URL::action('SessionsController@create')}}">log in</a> first.
</div>
@endif
<div class="list-group">
    @foreach ($products as $product)
    <div class="list-group-item product">
        {{ Form::open(array('action' => 'CartController@add')) }}
        <div class="head">
            <input type="hidden" value="{{$product->code}}" name="code">
            <img src="{{$product->small_thumb_url}}">
            <a href="{{URL::action('ProductsController@show', array('code' => $product->code))}}"><h4 class="list-group-item-heading">{{$product->name}}</h4></a>
            <span class="price">${{$product->price}}</span>
            <button type="submit" class="btn btn-sm btn-primary add">Add</button>
        </div>
        <div class="body">
            <label>Quantity:</label>
            <div class="input-group">
                <div class="input-group">
                    <span class="input-group-btn">
                        <button class="btn btn-default decrease" type="button">-</button>
                    </span>
                    <input type="text" class="form-control quantity" name="quantity">
                    <span class="input-group-btn">
                        <button class="btn btn-default increase" type="button">+</button>
                    </span>
                </div>
            </div>
        </div>
        {{Form::close()}}
    </div>

    @endforeach
</div>
@stop

@section('scripts')

{{ HTML::script('js/products.js') }}

@stop