<?php namespace Wq\Repositories;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {
    
    public function register() {
        $this->app->bind(
            'Wq\Repositories\UserRepositoryInterface',
            'Wq\Repositories\UserRepository'
        );
        
        $this->app->bind(
            'Wq\Repositories\ProductRepositoryInterface',
            'Wq\Repositories\ProductRepository'
        );
    }
}