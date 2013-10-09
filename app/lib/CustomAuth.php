<?php namespace Wq\Security;

use \Wq\Repositories\UserRepositoryInterface as UserRepository;

class CustomAuth extends Laravel\Auth\Drivers\Driver {
    
    private $userRepository;
    
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function attempt($arguments = array()) {
        $email = $arguments['email'];
        $password = $arguments['password'];
        $user = $this->userRepository->find($email);
        return $this->login($user->email, false);
    }

    public function retrieve($id) {
        return new \User();
    }

}