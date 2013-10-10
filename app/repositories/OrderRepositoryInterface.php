<?php namespace Wq\Repositories;

interface OrderRepositoryInterface {

    public function find($email);
    
    public function create($order);
}