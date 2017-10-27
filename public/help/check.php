<?php

/**
 * Black CMS, a simple content management system.
 * 
 * @author distributi0n <distributi0n@riseup.net>
 * @version 0.0.1
 * @package BlackCms_Master
 *
 */

echo '<style>
    body {
        margin-left: 34px;
        background-color: black;
        font-family: sans-serif;
        line-height: 24px;
        color: #fff;
    }
    </style>';

$start = microtime(true);

if (strnatcmp(phpversion(), '7.0.0') < 0) {
    echo writeError('<br>Error: You\'re running on an old PHP version.');
}

// todo: check for insecure web servers 
// todo: check for missing db tables 
// todo: check db table columns 

printf(writeSuccess("<br>Check finished in %.6f seconds."), (microtime(true) - $start));

function writeError($error) {
    return '<font color="red">' . $error . '</font>';
}

function writeSuccess($text) {
    return '<font color="limegreen">' . $text . '</font>';
}