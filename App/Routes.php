<?php

/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->respondWithController('GET', '/@[:name]', 'Me@blog');
$router->respondWithController('GET', '/vr/@[:name]', 'Vr@author');
$router->respondWithController('GET', '/vr/', 'Vr@index');
$router->respondWithController('GET', '/vr', 'Vr@index');
$router->respondWithController('GET', '/me/', 'Me@index');
$router->respondWithController('GET', '/me', 'Me@index');
$router->respondWithController('GET', '/dex/', 'Dex@index');
$router->respondWithController('GET', '/dex', 'Dex@index');
$router->respondWithController('GET', '/dex/dlux/', 'Dex@dlux');
$router->respondWithController('GET', '/dex/dlux', 'Dex@dlux');
$router->respondWithController('GET', '/apps', 'Apps@index');
$router->respondWithController('GET', '/apps/', 'Apps@index');
$router->respondWithController('GET', '/docs', 'Docs@index');
$router->respondWithController('GET', '/docs/', 'Docs@index');
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
$router->respondWithController('GET', '/new/node', 'Newpost@node');
$router->respondWithController('GET', '/new/node/', 'Newpost@node');
$router->respondWithController('GET', '/new/supercraft', 'Newpost@supercraft');
$router->respondWithController('GET', '/new/supercraft/', 'Newpost@supercraft');
$router->respondWithController('GET', '/new/advanced', 'Newpost@advanced');
$router->respondWithController('GET', '/new/advanced/', 'Newpost@advanced');
$router->respondWithController('GET', '/new/360-gallery', 'Newpost@threesixty');
$router->respondWithController('GET', '/new/360-gallery/', 'Newpost@threesixty');
$router->respondWithController('GET', '/new/360-tour', 'Newpost@threesixtytour');
$router->respondWithController('GET', '/new/360-tour/', 'Newpost@threesixtytour');
$router->respondWithController('GET', '/about/', 'About@index');
$router->respondWithController('GET', '/about', 'About@index');
// Dispatch the router
$router->dispatch();