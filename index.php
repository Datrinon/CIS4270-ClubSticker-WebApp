<?php

/**
 * Request broker GuitarShop Application.
 * 
 * @author jam
 * @version 180428
 */


// Non-web tree base directory for this application.
define('NON_WEB_BASE_DIR', 'C:/Users/Dan/Documents/_cis4270/assignments/cis4270/');
define('APP_NON_WEB_BASE_DIR', NON_WEB_BASE_DIR . 'clubsticker-GS-adaptation/');
include_once(APP_NON_WEB_BASE_DIR . 'includes/guitarShopIncludes.php');

session_start(); // for CSRF token

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

    if(csrf_token_is_valid()) {
        if(csrf_token_is_recent()) {  //csrf token is good.
            $actionPost = hPOST('action'); // read & sanitize in the post-sent action 
            $ctlrPost = hPOST('ctlr'); // read & sanitize in the post-sent ctlr
            // echo "Where am I Going?!: " . $actionPost . ' & ' . $ctlrPost; // DEBUG
            $action = isset($actionPost) ? $actionPost : ''; // if action is not set, assign nothing.
            $ctlr = isset($ctlrPost) ? $ctlrPost : 'index';  // if ctlr is not set, assign index (which will end up in default case);
        } else {
            $vm -> errorMsg .= "Form has expired.";
        }
    } else {
        $vm->errorMsg .= 'Missing or invalid form token.';
    }

    // If an error message popped up...
    // Prepare to output a user message. Set the action to invalidForm() on Home Controller.
    if ($vm->errorMsg !== '') {
        $action = 'invalidForm';
        $ctlr = 'home';
    }
}


switch ($ctlr) {
    case 'user':
        //echo $ctlr . " " . $action; // action not getting thru.
        $controller = new UserController();
        if ($action === 'register') {
            if ($post) {
                //echo "DEBUG: POST REQUEST";
                $action = 'registerPOST';
            } else {
                //echo "DEBUG: GET REQUEST";
                $action = 'registerGET';
            }
        }
        if ($action === 'login') {
            if ($post) {
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
