<?php

class CheckoutController extends BaseController {
    
    public function create() {
        return View::make('checkout.create');
    }
}