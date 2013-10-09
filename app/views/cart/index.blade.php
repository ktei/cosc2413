@extends('layouts.master')

@section('content')
<h1>My Cart</h1>
@foreach ($items as $item)
    <h3>{{$item->name}} x {{$item->quantity}}</h3>
@endforeach
@stop