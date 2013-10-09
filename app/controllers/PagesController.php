<?php

class PagesController extends BaseController {
    
    public function home() {
        return View::make('pages.home');
    }

    public function privacy() {
        return View::make('pages.privacy');
    }
}