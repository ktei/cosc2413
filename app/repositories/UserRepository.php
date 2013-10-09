<?php namespace Wq\Repositories;

class UserRepository implements UserRepositoryInterface {
    
    public function find($email) {
        return new User(array(
            'email' => 'ktei2008@gmail.com',
            'password' => 'password'
        ));
    }
}