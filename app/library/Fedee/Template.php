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

class Template 
{
    private $twigInstance;

    public function __construct() {
        $config = Fedee::get('fedee.config');
        $loader = new \Twig_Loader_Filesystem(ROOT . '/' . $config->get('core:template.full_directory'));

        if ($config->get('core:twig.caching.enabled')) {
            $this->twigInstance = new \Twig_Environment($loader, array(
                'cache' => ROOT . '/' . $config->get('core:twig.cache_directory'),
            ));
        }
        else {
            $this->twigInstance = new \Twig_Environment($loader);
        }
    }

    public function render($template, array $parameters = array()) {
        echo $this->twigInstance->render($template, $parameters);
    }
}