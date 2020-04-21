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
    public function indexAction()
    {
        preg_match('/\/@(.*)\//', $_REQUEST['url'], $_GET['author']);
        View::render('dlux/index.php', [
            'permlink' => 'a-test-post'
         ]);
    }
}