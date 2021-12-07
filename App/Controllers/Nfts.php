<?php

namespace App\Controllers;

use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Nfts extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function index($request, $response, $service)
    {
        View::render('nfts/index.php');
    }
	public function set($request, $response, $service)
    {
        View::render('nfts/set/index.php', [
            'set'    => $request->set
        ]);
    }
	    public function new($request, $response, $service)
    {
        View::render('nfts/new/index.php');
    }
	    public function newscript($request, $response, $service)
    {
        View::render('nfts/new/script.php');
    }
	    public function newset($request, $response, $service)
    {
        View::render('nfts/new/set.php');
    }
		public function newproof($request, $response, $service)
    {
		View::render('nfts/new/proof.php');
    }
}