<!-- This header applies for logged in users, and logged in users only. -->
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7 "> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]><html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>

    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title><?php echo Page::$title; ?></title>
    <meta name="description" content="Group 6's Website Project for CIS 4270.01">
    <meta name="author" content="Group 6">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Favicons -->
    <link rel="shortcut icon" href="club-sticker-images/favicon.ico">

    <!-- FONTS -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,400italic,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Patua+One:100,300,400,400italic,700'>
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet" type="text/css">

    <!-- Bootstrap -->

    <!-- CSS -->
    <link rel='stylesheet' href='css/global.css'>
    <link rel='stylesheet' href='css/structure.css'>
    <link rel='stylesheet' id='style-static' href='css/be_style.css'>
    <link rel='stylesheet' href='css/custom.css'>
    <link rel='stylesheet' href='css/profilecustom.css'>
    <link rel='stylesheet' href='css/uploadartworkcustom.css'>

    <!-- CSS Skin-->
    <link rel='stylesheet' href='css/skins/orange/stylec721.css'>


</head>

<body class="archive    -product with_aside aside_right woocommerce woocommerce-page color-blue layout-full-width header-modern subheader-title-left ">

    <!-- Main Theme Wrapper -->
    <div id="Wrapper">
        <!-- Header Wrapper -->
        <div id="Header_wrapper">
            <!-- Header -->
            <header id="Header">
                <!-- Header Top -  Info Area -->
                <div id="Action_bar">
                </div>
                <!-- Header -  Logo and Menu area -->
                <div id="Top_bar">
                    <div class="container">
                        <div class="column one">
                            <div class="top_bar_left clearfix">
                                <!-- Logo-->
                                <div class="logo">
                                    <img class="scale-with-grid" src="club-sticker-images/logo.png" alt="Club Sticker" />
                                </div>
                                <!-- Main menu-->
                                <div class="menu_wrapper">
                                    <nav id="menu">
                                        <ul id="menu-main-menu" class="menu">
                                            <li id="menu-item-1354">
                                                <a href="?ctlr=user&amp;action=userIndex" target="_Self""><span>Sticker Catalog</span></a>
                                            </li>
                                            <li id=" menu-item-1354" >
                                                    <!-- TODO: NEED TO REPLACE THIS WITH A FUNCTIONING UPLOAD BUTTON.  -->
                                                    <a href="?ctlr=user&amp;action=uploadArtwork" target="_self"><span style="border-right-width: 0px">Upload Artwork</span></a>
                                            </li>


                                            <li id="myAccountButton" class="navbar-right">
                                                <a href="?ctlr=user&amp;action=viewProfile" target="_self"><span>My Profile</span></a>
                                            </li>
                                            <li id="menu-item-1354">
                                                <a href="?ctlr=user&amp;action=logout" target="_self"><span> Logout </span></a>
                                            </li>

                                        </ul>
                                    </nav><a class="responsive-menu-toggle" href="#"><i class="icon-menu"></i></a>
                                </div>
                                <!-- Banner area - only for certain pages-->
                                <div class="banner_wrapper">
                                    <img src="club-sticker-images/banner-noprice.png" alt="">
                                </div>
                                <!-- Header Searchform area-->
                                <!-- Come back to this later and edit this-->
                            </div>
                            <div class="top_bar_right">
                                <div class="top_bar_right_wrapper">
                                    <!-- Shopping cart icon-->
                                    <a id="header_cart" href="#"><i class="icon-basket"></i><span>0</span></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>