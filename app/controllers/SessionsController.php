<?php

class SessionsController extends BaseController {

    public function create() {
        return View::make('sessions.create');
    }

    public function store() {
        $email = Input::get('email');
        $password = Input::get('password');
        if (Auth::attempt(array('email' => $email, 'password' => $password))) {
            return Redirect::intended('products');
        }
        $this->flashError('Login failed. Please check your email and password');
        return Redirect::action('SessionsController@create')
            ->withInput(Input::except('password'));
    }

    public function destroy() {
        Auth::logout();
        $this->flashNotice('You have logged out.');
        return Redirect::action('PagesController@home');
    }
}