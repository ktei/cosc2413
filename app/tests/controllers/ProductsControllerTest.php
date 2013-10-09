<?php


class ProductsControllerTest extends TestCase {

    public function setUp() {
        parent::setUp();
        $this->productRepository = $this->mock('Wq\Repositories\ProductRepositoryInterface');
    }

    public function test_get_index_action_should_succedd() {
        $this->productRepository->shouldReceive('all')->once();
        $this->action('GET', 'ProductsController@index');
        $this->assertViewHas('products');
    }
}