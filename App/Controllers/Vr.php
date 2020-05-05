<?php

namespace App\Controllers;

use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Vr extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function index($request, $response, $service)
    {
        View::render('vr/index.php');
    }
    public function author($request, $response, $service)
    {
        View::render('vr/index.php',[
            'author' => $request->name
        ]);
    }
}