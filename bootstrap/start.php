<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Illuminate\Foundation\Application;

$app->redirectIfTrailingSlash();

/*
|--------------------------------------------------------------------------
| Detect The Application Environment
|--------------------------------------------------------------------------
|
| Laravel takes a dead simple approach to your application environments
| so you can just specify a machine name or HTTP host that matches a
| given environment, then we will automatically detect it for you.
|
*/

$env = $app->detectEnvironment(array(

	'local' => array('your-machine-name'),

));

/*
|--------------------------------------------------------------------------
| Bind Paths
|--------------------------------------------------------------------------
|
| Here we are binding the paths configured in paths.php to the app. You
| should not be changing these here. If you need to change these you
| may do so within the paths.php file and they will be bound here.
|
*/

$app->bindInstallPaths(require __DIR__.'/paths.php');

/*
|--------------------------------------------------------------------------
| Load The Application
|--------------------------------------------------------------------------
|
| Here we will load the Illuminate application. We'll keep this is in a
| separate location so we can isolate the creation of an application
| from the actual running of the application with a given request.
|
*/

$framework = $app['path.base'].'/vendor/laravel/framework/src';

require $framework.'/Illuminate/Foundation/start.php';

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

defined('FILE_PRODUCTS') || define('FILE_PRODUCTS', 'products.txt');
defined('FILE_USERS') || define('FILE_USERS', 'users.txt');
defined('FILE_ORDERS') || define('FILE_ORDERS', 'orders.txt');
defined('DUMMY_USER_EMAIL') || define('DUMMY_USER_EMAIL', 'FOO');

defined('DELIVERY_POST') || define('DELIVERY_POST', 'regular_post');
defined('DELIVERY_COURIER') || define('DELIVERY_COURIER', 'courier');
defined('DELIVERY_EXPRESS_COURIER') || define('DELIVERY_EXPRESS_COURIER', 'express_courier');


return $app;
