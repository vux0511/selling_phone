<?php

    include "model/DBconfig.php";

    if (isset($_GET["controller"])) {
        $controller = $_GET["controller"];
    } else {
        $controller = '';
    }


    switch ($controller) {
        case 'category': {
            require_once ('controller/CategoryController.php');
            break;
        }
        case 'product': {
            require_once ('controller/ProductController.php');
            break;
        }
        case 'news': {
            require_once ('controller/NewsController.php');
            break;
        }
        case 'user': {
            require_once ('controller/UserController.php');
            break;
        }
        case 'slider': {
            require_once ('controller/SliderController.php');
            break;
        }
        case 'cart': {
            require_once ('controller/CartController.php');
            break;
        }
        case 'home': {
            require_once ('controller/index.php');
            break;
        }
        case 'back': {
            require_once ('controller/CategoryController.php');
            break;
        }
        case 'back_product': {
            require_once ('controller/ProductController.php');
            break;
        }
        case 'back_user': {
            require_once ('controller/UserController.php');
            break;
        }
        case 'login': {
            require_once ('controller/LoginController.php');
            break;
        }
        case 'logout': {
            require_once ('controller/LogoutController.php');
            break;
        }
        default:
            require_once ('controller/index.php');
            break;
    }
?>