<?php

    if (isset($_GET["act"])) {
        $act = $_GET["act"];
    } else {
        $act = '';
    }

    $thongbao = '';
    $error = '';



    switch ($act) {
        case 'delete_cart':
            if (isset($_GET['id_product'])) {
                $id_product = $_GET['id_product'];
                unset($_SESSION['my_cart'][$id_product]);
                header('location:index.php?controller=cart');
            }
        break;

        case 'order_complete':
            require_once ('view/public/layout/header.php');
            require_once ('view/public/layout/order_complete.php');
            require_once ('view/public/layout/footer.php');
        break;

        default:
            require_once ('view/public/layout/header.php');
            if (isset($_COOKIE['login'])) {
                $user = $_COOKIE['login'];
                $sql = "SELECT * FROM user WHERE user = '$user'";
                $select_id_user = selectOne($sql);
                $id_user =  $select_id_user['id_user'];

                if (isset($_GET['id_bill'])) {
                    $id_bill = $_GET['id_bill'];
                }
                $sql = "SELECT * FROM bill1 WHERE id_bill = '$id_bill'";
                $bill1 = SelectOne($sql);
                $id_product = $bill1['id_product'];
                $sql = "SELECT * FROM product WHERE id_product = '$id_product'";
                $select_id_product = SelectAll($sql);
                var_dump($select_id_product);
            }


            require_once ('view/public/layout/info_cart_order.php');
            require_once ('view/public/layout/footer.php');
            break;
    }
?>
