<?php

namespace App\Controllers;

use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Dex extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function index($request, $response, $service)
    {
        View::render('dex/index.php');
    }
	public function dlux($request, $response, $service)
    {
        View::render('dex/dlux.php');
    }
	public function larynx($request, $response, $service)
    {
        View::render('dex/larynx.php');
    }
	public function grid($request, $response, $service)
    {
        View::render('dex/grid.php');
    }
	public function old($request, $response, $service)
    {
        View::render('dex/old.php');
    }
}