<?php

use \Way\Tests\Assert;

class UserRepositoryTest extends TestCase {

    public function setUp() {
        parent::setUp();
        $this->userRepository = new \Wq\Repositories\UserRepository();
    }

    public function test_find_by_id_should_succeed() {
        $expect = $this->userRepository->find('ktei2008@gmail.com');
        Assert::equals('ktei2008@gmail.com', $expect->email);
    }
}