<?php namespace Wq\Repositories;

interface ProductRepositoryInterface {
    
    public function all();

    public function find($code);
}