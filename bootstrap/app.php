<?php

/**
 * Fedee CMS, a simple content management system.
 * 
 * @author distributi0n <distributi0n@riseup.net>
 * @version 0.0.1
 * @package FedeeCms_Master
 *
 */

use \App\Fedee\Fedee;

define("START", microtime(true));
define("ROOT", realpath(__DIR__.'/../'));

require ROOT . '/app/library/Fedee/Fedee.php';

$router = Fedee::get('fedee.routing');

$router->setRoutes();
$router->dispatch();

// Fedee::get('fedee.template')->render('index.html');

printf("\n<!-- Page was rendered in %.6f seconds -->", (microtime(true) - START));
