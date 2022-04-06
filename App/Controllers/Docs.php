<?php

namespace App\Controllers;

use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Docs extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function index($request, $response, $service)
    {
        View::render('docs/index.html');
    }
}