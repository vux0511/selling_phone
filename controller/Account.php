<?php

    if (isset($_GET["act"])) {
        $act = $_GET["act"];
    } else {
        $act = '';
    }


    $thongbao = '';
    $error = '';

    switch ($act) {
        case 'account': {
            require_once ('view/public/layout/header.php');
            require_once ('view/public/layout/account.php');
            require_once ('view/public/layout/footer.php');
            break;
        }
        case 'update': {
            require_once ('view/public/layout/header.php');
            require_once ('view/public/layout/update_account.php');
            require_once ('view/public/layout/footer.php');
            break;
        }
        case 'update_password': {
            require_once ('view/public/layout/header.php');
            require_once ('view/public/layout/update_password.php');
            require_once ('view/public/layout/footer.php');
            break;
        }
        default:
            require_once ('view/public/layout/header.php');
            require_once ('view/public/layout/slider.php');
            require_once ('view/public/layout/banner.php');
            require_once ('view/public/layout/footer.php');
            break;
    }
?>