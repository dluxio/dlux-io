<?php

namespace App\Controllers;

use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Me extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function index($request, $response, $service)
    {
        View::render('me/index.php');
    }
    public function test($request, $response, $service)
    {
        View::render('me/test.php');
    }
    public function blog($request, $response, $service)
    {
        View::render('me/index.php',[
            'author' => $request->name
        ]);
    }
}