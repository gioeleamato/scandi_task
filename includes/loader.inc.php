<?php

/**
 *  This file contains the code for the classes autoloader.
 */
spl_autoload_register("loader");

function loader($class)
{
    $url = $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
    
    if (strpos($url, "includes") !== false) {
        $path = "../classes/";
    } else {
        $path = "classes/";
    }

    $extension = ".class.php";
    require_once $path.lcfirst($class).$extension;
}
