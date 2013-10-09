<?php

class PagesControllerTest extends TestCase {

    public function test_get_home_action_should_succeed() {
        $this->action('GET', 'PagesController@home');
        $this->assertResponseOk();
    }

    public function test_get_privact_action_should_succeed() {
        $this->action('GET', 'PagesController@privacy');
        $this->assertResponseOk();
    }
}