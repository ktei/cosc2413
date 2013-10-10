<?php

class OrdersController extends BaseController {

    public function __construct() {
        $this->beforeFilter('auth');
    }

    public function index() {
        return View::make('orders.index');
    }

    public function create() {
        return View::make('orders.create');
    }

    public function store() {
        Session::put('cart.items', array());
        return Redirect::action('OrdersController@show');
    }

    public function show() {
        return View::make('orders.show');
    }
    
}