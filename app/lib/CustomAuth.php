<?php namespace Wq\Security;

class CustomAuth extends Laravel\Auth\Drivers\Driver {
    
    public function __construct() {
        
    }

    public function attempt($arguments = array()) {
        $username = $arguments['email'];
        $password = $arguments['password'];
        return $this->login($result->email, false);
    }

    public function retrieve($id) {
        return new \User();
    }

}