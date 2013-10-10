<?php namespace Wq\Repositories;

interface OrderRepositoryInterface {

    public function findAll($email);
    
    public function create($order);
}