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

class Fedee 
{
    private static $libraries = array();

    public static function get($library)
    {
        if (isset(self::$libraries[$library]) && isset(self::$classes[$library])) {
            return self::$libraries[$library];
        }

        $fixedLibrary = str_replace('.', '/', $library);
		$file = ROOT . '/app/library/' . strtolower($fixedLibrary) . '.php';

        self::$libraries[$library] = $library;

        require($file);
        
        $declared = get_declared_classes();
        $workingClass = end($declared);

        self::$libraries[$library] = new $workingClass();
        return self::$libraries[$library];
    }
}