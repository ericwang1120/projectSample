<?php
/**
 * 159339Assignment2
 * XIN WANG 15397438
 */
//.Define system variables
define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', dirname(__FILE__));
define('INDEX_URL', 'http://' . $_SERVER['HTTP_HOST'] . DS . 'firstNationalBank');

//Require parent classes
require 'libs/vendor/autoload.php';
require_once("core/dbHandler.php");

session_start();

//Create object of dispatcher
$app = new Slim\App();

require_once('dispatchers/authentication.php');
require_once('dispatchers/account.php');
require_once('dispatchers/transaction.php');
require_once('dispatchers/user.php');

function checkUserByAccount($accountID)
{
    //check userID
    $dbAccount = new dbHandler("account");
    $account = $dbAccount->selectByID($accountID);
    $userID = json_decode($account)[0]->USER_ID;
    if ($userID == $_SESSION['userID']) {
        return true;
    } else {
        return false;
    }
}

$app->run();

