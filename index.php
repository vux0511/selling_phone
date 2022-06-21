<?php

    include "model/DBconfig.php";

    session_start();

    if (!isset($_SESSION['my_cart'])) $_SESSION['my_cart']=[];

    if (isset($_GET["controller"])) {
        $controller = $_GET["controller"];
    } else {
        $controller = '';
    }




    switch ($controller) {
        case 'product': {
            require_once ('controller/ProductController.php');
            break;
        }
        case 'contact': {
            require_once ('controller/ContactController.php');
            break;
        }
        case 'about': {
            require_once ('controller/AboutController.php');
            break;
        }
        case 'search': {
            require_once ('controller/SearchController.php');
            break;
        }
        case 'detail': {
            require_once ('controller/DetailController.php');
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
        case 'login': {
            require_once ('controller/LoginController.php');
            break;
        }
        case 'register': {
            require_once ('controller/RegisterController.php');
            break;
        }
        case 'logout': {
            require_once ('controller/LogoutController.php');
            break;
        }
        case 'account': {
            require_once ('controller/Account.php');
            break;
        }
        case 'cart_order': {
            require_once ('controller/CartOrderController.php');
            break;
        }
        case 'info_cart_order': {
            require_once ('controller/InfoCartOrderController.php');
            break;
        }
        default:
            require_once ('controller/index.php');
            break;
    }
?>

<script>
$(document).ready(function() {
    $("#xemthem").click(function() {
        $.get("tab-product.php", {
            $trang: 1
        }, function(data) {
            $("#danhsach").append(data);
        });
    });
});
</script>