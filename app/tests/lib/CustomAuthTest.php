<?php

use \Way\Tests\Assert;

class CustomAuthTest extends TestCase {

    public function setUp() {
        parent::setUp();
        $this->customAuth = new \Wq\Security\CustomAuth;
    }

    public function test_retrieveById_should_succeed() {
        $user = $this->customAuth->retrieveById('ktei2008@gmail.com');
        $this->assertUser($user);
    }

    public function test_retrieveByCredentials_should_succeed() {
        $user = $this->customAuth->retrieveByCredentials(array('email' => 'ktei2008@gmail.com', 'password' => 'password'));
        $this->assertUser($user);
    }

    public function test_validateCredentials_should_succeed() {
        $testUser = new User(array(
            'email' => 'ktei2008@gmail.com',
            'password' => 'password'
        ));
        $actual = $this->customAuth->validateCredentials($testUser, array('email' => 'ktei2008@gmail.com', 'password' => 'password'));
        Assert::true($actual, 'expected true for test user ktei2008@gmail.com');
    }

    private function assertUser($user) {
        Assert::equals('ktei2008@gmail.com', $user->email);
        Assert::equals('password', $user->password);
        Assert::equals('Rui Cheng', $user->name);
        Assert::equals('Ryarc', $user->biz_name);
    }

}