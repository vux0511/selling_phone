<?php

    if (isset($_GET["act"])) {
        $act = $_GET["act"];
    } else {
        $act = '';
    }

    $thongbao = '';
    $error = '';

    switch ($act) {
        default:
            require_once ('view/public/layout/header.php');
            require_once ('view/public/layout/about.php');
            require_once ('view/public/layout/footer.php');
            break;
    }
?>