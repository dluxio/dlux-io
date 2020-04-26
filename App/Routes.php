<?php

/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->respondWithController('GET', '/@[:name]', 'Me@blog');
$router->respondWithController('GET', '/me/', 'Me@index');
$router->respondWithController('GET', '/me', 'Me@index');
$router->respondWithController('GET', '/dex/', 'Dex@index');
$router->respondWithController('GET', '/dex', 'Dex@index');
$router->respondWithController('GET', '/apps', 'Apps@index');
$router->respondWithController('GET', '/apps/', 'Apps@index');
$router->respondWithController('GET', '/login/', 'Login@index');
$router->respondWithController('GET', '/login', 'Login@index');
$router->respondWithController('GET', '/blog/@[:name]/[:permlink]', 'Blog@index');
$router->respondWithController('GET', '/dlux/', 'Dlux@index');
$router->respondWithController('GET', '/api/', 'Api@index');
$router->respondWithController('GET', '/dlux/@[:name]/[:permlink]', 'Dlux@index');
$router->respondWithController('GET', '/@[:name]/[:permlink]', 'Dlux@index');
$router->respondWithController('GET', '/dluxar/@[:name]/[:permlink]', 'Dlux@ar');
$router->respondWithController('GET', '/qr', 'Qr@index');
$router->respondWithController('GET', '/', 'Home@index');
$router->respondWithController('GET', '/new', 'Newpost@index');
$router->respondWithController('GET', '/new/', 'Newpost@index');
$router->respondWithController('GET', '/new/supercraft', 'Newpost@supercraft');
$router->respondWithController('GET', '/new/supercraft/', 'Newpost@supercraft');
// Dispatch the router
$router->dispatch();