<?php
/**************************************************
 * Functions
 **************************************************/
// Class Auto Loader
function classAutoLoader($class) {
    $class = strtolower($class);
    $path = $_SERVER["DOCUMENT_ROOT"] . '/admin/includes/classes/'. $class .'.php';
    if (is_file($path) && !class_exists($class)) {
        include($path);
    } else {
        die($class .'.php file doesn\' exist!');
    }
}
spl_autoload_register('classAutoLoader');

// Redirect Function
function redirect($location) {
    header('Location: ' . $location);
}
?>