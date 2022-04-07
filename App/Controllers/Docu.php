<?php

namespace App\Controllers;

use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Docu extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function index($request, $response, $service)
    {
        View::render('docu/index.html');
    }
}