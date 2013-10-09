<?php

class PublicController extends BaseController {
    
    public function index() {
        return View::make('public.index');    
    }
}