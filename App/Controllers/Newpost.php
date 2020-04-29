<?php

namespace App\Controllers;

use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Newpost extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function index($request, $response, $service)
    {
        View::render('new/index.php');
    }
    public function supercraft($request, $response, $service)
    {
        View::render('new/supercraft.php');
    }
    public function advanced($request, $response, $service)
    {
        View::render('new/advanced.php');
    }
}
