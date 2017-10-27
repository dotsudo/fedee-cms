<?php 

/**
 * Fedee CMS, a simple content management system.
 * 
 * @author distributi0n <distributi0n@riseup.net>
 * @version 0.0.1
 * @package FedeeCms_Master
 *
 */

namespace App\Fedee;

defined('START') or exit('We couldn\'t process your request right now.');

class Routing 
{
    private $router;

    public function __construct() {
        $this->router = new \TreeRoute\Router();
    }

    public function setRoutes() {
        $this->router->addRoute('GET', '/test', 'testhandler');
    }

    public function dispatch() {
        $uri = substr($_SERVER['REQUEST_URI'], strlen(implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/'));
        $method = $_SERVER['REQUEST_METHOD'];

        $result = $this->router->dispatch($method, $uri);
        
        if (!isset($result['error'])) {
            $handler = $result['handler'];
            $params = $result['params'];

            echo 'todo: do something || ' . $handler;
        } 
        else {
            switch ($result['error']['code']) {
                case 404 :
                    echo 'Not found handler here';
                    break;
                case 405 :
                    echo 'Method not allowed handler here';
                    $allowedMethods = $result['allowed'];
                    if ($method == 'OPTIONS') {
                        // OPTIONS method handler here
                    }
                    break;
            }
        }
    }
}