<?php

/**
 * Front controller
 *
 * PHP version 7.0
 */

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';


/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('apps', ['controller' => 'Apps', 'action' => 'index']);
$router->add('@[:username]', ['controller' => 'Me', 'action' => 'index']);
$router->add('@[:username]/[:permlink]', ['controller' => 'Dlux', 'action' => 'index']);
$router->add('api', ['controller' => 'Api', 'action' => 'index']);
$router->add('dlux', ['controller' => 'Dlux', 'action' => 'index']);
$router->add('dluxar/@{authot}/{permlink}', ['controller' => 'Dlux', 'action' => 'index']);
$router->add('blog', ['controller' => 'Blog', 'action' => 'index']);
$router->add('dex', ['controller' => 'Dex', 'action' => 'index']);
$router->add('me', ['controller' => 'Me', 'action' => 'index']);
$router->add('me/', ['controller' => 'Me', 'action' => 'index']);
$router->add('login', ['controller' => 'Login', 'action' => 'index']);
$router->add('', ['controller' => 'Home', 'action' => 'index']);
    
$router->dispatch($_SERVER['QUERY_STRING']);
