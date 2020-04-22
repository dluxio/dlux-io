<?php

/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->respondWithController('GET', '/@[:name]', 'Me@index');
$router->respondWithController('GET', '/me/', 'Me@index');
//$router->respondWithController('GET', '/me/', 'Me@index');
$router->respondWithController('GET', '/dex/', 'Dex@index');
//$router->respondWithController('GET', '/dex/', 'Dex@index');
$router->respondWithController('GET', '/apps/', 'Apps@index');
$router->respondWithController('GET', '/login/', 'Login@index');
$router->respondWithController('GET', '/blog/', 'Blog@index');
$router->respondWithController('GET', '/dlux/', 'Dlux@index');
$router->respondWithController('GET', '/api/', 'Api@index');
$router->respondWithController('GET', '/dluxar/@[:name]/[:permlink]/', 'Dlux@index');
$router->respondWithController('GET', '/', 'Home@index');
// Dispatch the router
$router->dispatch();