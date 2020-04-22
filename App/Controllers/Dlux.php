<?php

namespace App\Controllers;

use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Dlux extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function index($request, $response, $service)
    {
        View::render('dlux/index.php', [
            'author'    => $request->name,
            'permlink'  => $request->permlink
        ]);
    }
}