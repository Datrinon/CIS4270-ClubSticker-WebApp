<?php

/**
 * Request broker GuitarShop Application.
 * 
 * @author jam
 * @version 180428
 */
session_start();

// Non-web tree base directory for this application.
define('NON_WEB_BASE_DIR', 'C:/Users/Dan/Documents/_cis4270/assignments/cis4270/');
define('APP_NON_WEB_BASE_DIR', NON_WEB_BASE_DIR . 'clubsticker-GS-adaptation/');
include_once(APP_NON_WEB_BASE_DIR . 'includes/guitarShopIncludes.php');


// Sanitize the routing input from links and forms - set default values if
// missing.
$post = true;
if (hRequestMethod() === 'GET') { //hRequestMethod sanitizes $_SERVER[REQUEST_METHOD]
    $vm = null;
    $actionGET = hGET('action');
    $ctlrGET = hGET('ctlr');
    $ctlr = isset($ctlrGET) ? $ctlrGET : '';
    $actionSet = isset($actionGET) ? $actionGET : '';


    // Whitelist actions from a GET request.
    $action = hasInclusionIn($actionSet, $whiltelistGET) ? $actionSet : '';
    // echo "DEBUG: " . $action . " RESULT: " . ($action !== '');
    if (!$action !== '') { // interesting. if no action is given, it's true. if an action is in the whitelist, it's true.
        $post = false;
        // echo "</br> DEBUG: If blank, POST is false: " . $post;
    }
} else {

    // POST request processing
    $vm = MessageVM::getErrorInstance();

    $actionPost = hPOST('action');
    $ctlrPost = hPOST('ctlr');
    $action = isset($actionPost) ? $actionPost : '';
    $ctlr = isset($ctlrPost) ? $ctlrPost : 'index';

    if ($vm->errorMsg !== '') {
        $action = '';
        $ctlr = '';
    }
}


switch ($ctlr) {
    case 'register':
        //echo $ctlr . " " . $action; // action not getting thru.
        $controller = new RegisterController();
        if ($action === 'register') {
            if ($post) {
                //echo "DEBUG: POST REQUEST";
                $action = 'registerPOST';
            } else {
                //echo "DEBUG: GET REQUEST";
                $action = 'registerGET';
            }
        }
        break;
    case 'login':
        $controller = new LoginController();
        if ($action === 'login') {
            if ($post) {
                echo "THIS IS THE ONE";
                $action = 'loginPOST';
            } else {
                $action = 'loginGET';
            }
        }
    break;
    case 'admin':
        $controller = new AdminController();
        if ($action === 'addProduct') {
            if ($post) {
                $action = 'addEditProduct';
            } else {
                $action = 'showAddProduct';
            }
        }
        break;
    case 'home':
        $controller = new HomeController();
        break;
    case 'cart':
        $controller = new CartController();
        break;
    default:
        $controller = new DefaultController();
}
$controller->run($action, $vm);
