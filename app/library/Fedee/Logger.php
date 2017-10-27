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

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

defined('START') or exit('We couldn\'t process your request right now.');

class FedeeLogger 
{
    private $logger;

    public function __construct() {
        $config = Fedee::get('fedee.config');

        $this->logger = new Logger($config->get('core:monolog.log_name'));
        $this->logger->pushHandler(new StreamHandler(ROOT . $config->get('core:monolog.log_directory'), Logger::WARNING));
    }

    public function getLogger() {
        return $this->logger;
    }
}