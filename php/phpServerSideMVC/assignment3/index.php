<?php
/**
 * 159339Assignment3
 * XIN WANG 15397438
 * Tianxiang Han 13064237
 * Zhen Cheng 13040788
 *
 * This file access http requests and create an object of dispatcher.
 */
//.Define system variables
define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', dirname(__FILE__));
define('INDEX_URL', 'http://'.$_SERVER['HTTP_HOST'].DS.'assignment3');

//Require parent classes
require ROOT_PATH . DS . 'config.php';
require ROOT_PATH.DS.'Core'.DS.'Dispatcher.php';
require ROOT_PATH.DS.'Core'.DS.'Controller.php';
require ROOT_PATH.DS.'Core'.DS.'View.php';

//Create object of dispatcher
$dpt = new Dispatcher();
$return_status = $dpt->run();
echo $return_status;

exit(0);
