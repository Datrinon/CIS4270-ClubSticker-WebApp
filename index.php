<?php

$lifetime = 0;
$secure = true;
$httponly = true;

// Cookie settings for live site
// session_set_cookie_params($lifetime, "/", ".club-sticker.com", $secure, $httponly);


//! STAGING VER:
// Non-web tree base directory for this application.
define('NON_WEB_BASE_DIR', 'C:/Users/Dan/Documents/_cis4270/assignments/cis4270/');
define('APP_NON_WEB_BASE_DIR', NON_WEB_BASE_DIR . 'clubsticker-GS-adaptation/');
include_once(APP_NON_WEB_BASE_DIR . 'includes/guitarShopIncludes.php');
// Web base directory
define('WEB_BASE_DIR', $_SERVER['DOCUMENT_ROOT'] . '/clubsticker-staging/');

//! PRODUCTION VER:
// Non-web tree base directory for this application.
// define('NON_WEB_BASE_DIR', '/home/c1lfskn4slo8/cis4270/');
// define('APP_NON_WEB_BASE_DIR', NON_WEB_BASE_DIR . 'clubSticker/');
// include_once(APP_NON_WEB_BASE_DIR . 'includes/guitarShopIncludes.php');
// Web base directory
// define('WEB_BASE_DIR', $_SERVER['DOCUMENT_ROOT'] . '/');


session_start(); // for CSRF token
// var_dump($_SESSION); // Debug to keep track of _SESSION array

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
            $action = isset($actionPost) ? $actionPost : 'index'; // if action is not set, assign nothing.
            $ctlr = isset($ctlrPost) ? $ctlrPost : 'home';  // if ctlr is not set, assign index (which will end up in default case);
        } else {
            $vm->errorMsg .= "Form has expired.";
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
        //echo $ctlr . " " . $action; // debug to show controller and action -- in case it doesn't go through.
        $controller = new UserController();
        if ($action === 'register') {
            if ($post) {
                $action = 'registerPOST';
            } else {
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
        if ($action === 'uploadArtwork') {
            if ($post) {
                $action = 'uploadArtworkPOST';
            } else {
                $action = 'uploadArtworkGET';
            }
        }
        if ($action === 'editProfile') {
            if ($post) {
                $action = 'editProfilePOST';
            } else {
                $action = 'editProfileGET';
            }
        }
        break;
    case 'home':
        $controller = new HomeController();
        break;
    default:
        // echo "default controller running here, case not matched anywhere"; //!DEBUG
        $controller = new DefaultController();
}
$controller->run($action, $vm);
