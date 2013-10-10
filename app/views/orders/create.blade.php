@extends('layouts.master')

@section('content')
<h1>Checkout <small>confirm your order</small></h1>
{{Form::open(array('action' => 'OrdersController@store', 'class' => 'form-horizontal'))}}
<div class="form-group">
    <label for="first-name" class="col-lg-2 control-label">First name</label>
    <div class="col-lg-10">
        {{ Form::text('first_name', '', array('class' => 'form-control', 'id' => 'first-name', 'autofocus' => '', 'placeholder' => 'First name')) }}
    </div>
</div>
<div class="form-group">
    <label for="last-name" class="col-lg-2 control-label">Last name</label>
    <div class="col-lg-10">
        {{ Form::text('last_name', '', array('class' => 'form-control', 'id' => 'last-name', 'placeholder' => 'Last name')) }}
    </div>
</div>
<div class="form-group">
    <label for="address" class="col-lg-2 control-label">Address</label>
    <div class="col-lg-10">
        {{ Form::textarea('address', '', array('class' => 'form-control address', 'id' => 'address', 'placeholder' => 'Address')) }}
    </div>
</div>
<div class="form-group">
    <label for="email" class="col-lg-2 control-label">Email</label>
    <div class="col-lg-10">
        {{ Form::email('email', '', array('class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email')) }}
    </div>
</div>
<div class="form-group">
    <label for="phone" class="col-lg-2 control-label">Phone</label>
    <div class="col-lg-10">
        {{ Form::text('phone', '', array('class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Phone')) }}
    </div>
</div>
<div class="form-group">
    <label class="col-lg-2 control-label">Delivery</label>
    <div class="col-lg-10">
        <div class="radio">
            <label>
                {{Form::radio('delivery_method', DELIVERY_POST, true)}}
                Regular post
            </label>
        </div>
        <div class="radio">
            <label>
                {{Form::radio('delivery_method', DELIVERY_COURIER, false)}}
                Courier
            </label>
        </div>
        <div class="radio">
            <label>
                {{Form::radio('delivery_method', DELIVERY_EXPRESS_COURIER, false)}}
                Express courier
            </label>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="credit-card-number" class="col-lg-2 control-label">Credit card</label>
    <div class="col-lg-10">
        {{ Form::text('credit_card_number', '', array('class' => 'form-control', 'id' => 'credit-card-number', 'placeholder' => 'Credit card number')) }}
    </div>
</div>
<div class="form-group">
    <label for="newsletter" class="col-lg-2 control-label">Newsletter</label>
    <div class="col-lg-10">
        <div class="checkbox">
            <label>
                {{ Form::checkbox('newsletter', '0') }}
                Subscription
            </label>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary btn-lg pull-right">Confirm</button>
{{Form::close()}}
@stop