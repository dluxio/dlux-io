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
$router->respondWithController('GET', '/dex/larynx/', 'Dex@larynx');
$router->respondWithController('GET', '/dex/larynx', 'Dex@larynx');
$router->respondWithController('GET', '/nfts/', 'Nfts@index');
$router->respondWithController('GET', '/nfts', 'Nfts@index');
$router->respondWithController('GET', '/nfts/new/', 'Nfts@new');
$router->respondWithController('GET', '/nfts/new', 'Nfts@new');
$router->respondWithController('GET', '/nfts/new/set/', 'Nfts@newset');
$router->respondWithController('GET', '/nfts/new/set', 'Nfts@newset');
$router->respondWithController('GET', '/nfts/new/script/', 'Nfts@newscript');
$router->respondWithController('GET', '/nfts/new/script', 'Nfts@newscript');
$router->respondWithController('GET', '/nfts/new/proof/', 'Nfts@newproof');
$router->respondWithController('GET', '/nfts/new/proof', 'Nfts@newproof');
$router->respondWithController('GET', '/nfts/set/[:set]', 'Nfts@set');
$router->respondWithController('GET', '/nfts/set', 'Nfts@set');
$router->respondWithController('GET', '/nfts/explore/', 'Nfts@explore');
$router->respondWithController('GET', '/nfts/explore', 'Nfts@explore');
$router->respondWithController('GET', '/dex/grid/', 'Dex@grid');
$router->respondWithController('GET', '/dex/grid', 'Dex@grid');
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
$router->respondWithController('GET', '/honeycomb/', 'Honeycomb@index');
$router->respondWithController('GET', '/honeycomb', 'Honeycomb@index');
$router->respondWithController('GET', '/apps/new/', 'Apps@new');
$router->respondWithController('GET', '/apps/new', 'Apps@new');
// Dispatch the router
$router->dispatch();