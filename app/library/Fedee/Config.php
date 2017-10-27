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

class Config 
{
    private $config = array();

    public function __construct() {

        /* HostName for your DB server, usually '127.0.0.1'. */
        $this->set('core:database.hostname', '127.0.0.1');

        /* Username for your DB server, usually 'root'. */
        $this->set('core:database.username', 'root');

        /* Password for your DB server, occasionally empty. */
        $this->set('core:database.password', 'MwLs9h^UCWSKXc3eVd');

        /* Name for your database, this ones on you. */
        $this->set('core:database.name', 'testing');

        /* MonoLog logger name ( logger channel ). */
        $this->set('core:monolog.log_name', 'fedee');

        /* Directory that you keep your log files in. */
        $this->set('core:monolog.log_directory', '/storage/logging');

        /* Enable caching for template files? We advise you to. */
        $this->set('core:twig.caching.enabled', false);

        /* Cache directory for the cached template files. */
        $this->set('core:twig.cache_directory', '/storage/cache/templates');

        /* Directory that you store your template files. */
        $this->set('core:template.directory', 'resources/templates');
        
        /* Template folder, basically your theme folder name. */
        $this->set('core:template.folder', 'test');

        /* Ignore this, unless you know what it is. */
        $this->set('core:template.full_directory', $this->config['core:template.directory'] . '/' . $this->config['core:template.folder']);
    }

    public function get($key){
        return isset($this->config[$key]) ? $this->config[$key] : '';
    }

    public function set($key, $value) {
        $this->config[$key] = $value;
    }
}