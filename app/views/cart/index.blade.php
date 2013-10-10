@extends('layouts.master')

@section('content')
<h1>My Cart</h1>
@if (count($items) > 0)
<ul class="pager">
  <li class="previous"><a href="{{URL::action('ProductsController@index')}}">&larr; Products</a></li>
  <li class="next"><a href="{{URL::action('OrdersController@create')}}">Checkout &rarr;</a></li>
</ul>
<table class="table table-hover">
  <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($items as $item)
    <tr>
        <td>
            {{$item->code}}
        </td> 
        <td>
            <a href="{{URL::action('ProductsController@show', array('code' => $item->code))}}">
                {{$item->name}}
            </a>
        </td>
        <td>{{$item->quantity}}</td>
        <td>{{$item->quantity * $item->price}}</td>
        <td><a href="{{URL::action('CartController@remove', array('code' => $item->code))}}">Remove</a></td>
    </tr>
    @endforeach
    </tbody>
</table>
<hr>
<h3>Total: ${{$total_price}}</h3>

<a href="{{URL::action('CartController@clear')}}" 
    class="btn btn-default pull-right">Clear cart</a>
    
<a href="{{URL::action('OrdersController@create')}}"
    class="btn btn-primary pull-right" style="margin-right:15px">Checkout</a>

@else
<div class="alert alert-info">
    At this moment, you don't have any product in your cart.
    <h3><a href="{{URL::action('ProductsController@index')}}">Browse our products and buy now!</a></h3>
</div>
@endif

@stop