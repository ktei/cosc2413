<?php

use \Way\Tests\Assert;

class ProductRepositoryTest extends TestCase {

    use TestHelpers;

    public function setUp() {
        parent::setUp();
        $this->faker = \Faker\Factory::create();
        $this->userRepository = $this->mock('Wq\Repositories\UserRepositoryInterface');
        $this->productRepository = new \Wq\Repositories\ProductRepository($this->userRepository);
    }

    public function test_get_all_should_succeed() {
        $this->userRepository->shouldReceive('find')->once()->andReturn($this->createTestUser());
        $all = $this->productRepository->all();
        Assert::equals(10, count($all));
        Assert::equals('p-1', $all[1]->code);
    }


}