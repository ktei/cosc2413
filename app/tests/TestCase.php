<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

    public function setUp() {
        parent::setUp();
        Route::enableFilters();
        $this->prepare();
    }

	/**
	 * Creates the application.
	 *
	 * @return Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		$unitTesting = true;

		$testEnvironment = 'testing';

		return require __DIR__.'/../../bootstrap/start.php';
	}

    protected function mock($class) {
        $mock = Mockery::mock($class);
        $this->app->instance($class, $mock);
        return $mock;
    }

    private function prepare() {
        Artisan::call('data:create', array('count' => 10));
        Mail::pretend(true);
    }

}
