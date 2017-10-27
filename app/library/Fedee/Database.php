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

class Database 
{
    private $connection;

    public function __construct() {
        $config = Fedee::get('fedee.config');

        $this->connection = mysqli_connect(
            $config->get('core:database.hostname'), 
            $config->get('core:database.username'), 
            $config->get('core:database.password'), 
            $config->get('core:database.name')
        );
    }
}