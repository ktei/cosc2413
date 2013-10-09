<?php

class SessionsControllerTest extends TestCase {
    use TestHelpers;

    public function test_get_create_action_should_succeed() {
        $this->action('GET', 'SessionsController@create');
        $this->assertResponseOk();
    }

    public function test_login_should_succeed_with_correct_credentials() {
        $this->action('POST', 'SessionsController@store', array(), array('email' => 'ktei2008@gmail.com', 'password' => 'password'));
        $this->assertRedirectedToAction('ProductsController@index');
    }

    public function test_login_should_fail_with_wrong_credentials() {
        $this->action('POST', 'SessionsController@store', array(), array('email' => 'wrong_email@gmail.com', 'password' => 'wrong_password'));
        $this->assertRedirectedToAction('SessionsController@create');
    }
}