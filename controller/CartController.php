<?php

    if (isset($_GET["act"])) {
        $act = $_GET["act"];
    } else {
        $act = '';
    }

    $thongbao = '';
    $error = '';


    if (isset($_POST['buy_product'])) {
        if (!isset($_COOKIE['login'])) {
            header('location:index.php?controller=login');
        } else {
            $user = $_COOKIE['login'];
            $sql = "SELECT * FROM user WHERE user = '$user'";
            $user = selectOne($sql);

            $id_user = $user['id_user'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $note = $_POST['note'];
            $subtotal = $_POST['subtotal'];


            if ($fullname == '' || $email == '' || $phone == '' || $address == '') {
                $error = '<h5 style="color: red; font-size: 17px; text-align: center;">Lỗi : Không được để trống</h5>';
            } else {
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date_order = (date("Y-m-d H:i:s"));
                $sql = "INSERT INTO bill ( id_user, address, date_order, phone, fullname, note, subtotal) VALUES ('$id_user','$address', '$date_order','$phone','$fullname','$note','$subtotal')";
                if (execute($sql)) {
                    $sql = "SELECT * FROM bill WHERE id_user = '$id_user' AND date_order = '$date_order'";
                    $select = selectOne($sql);

                    $id_bill = $select['id_bill'];

                    foreach ($_SESSION['my_cart'] as $key =>  $value) {
                        $id_product = $key;
                        $quantity = $value;

                        $sql = "INSERT INTO bill1 (id_bill,id_product, quantity) VALUES ('$id_bill', '$id_product', '$quantity')";
                        $insertBill = execute($sql);
                        if ($insertBill) {
                            $error = '<h5 style="color: green; font-size: 17px; text-align: center;">Đặt hàng thành công</h5>';
                            unset($_SESSION['my_cart'][$id_product]);
                            header('location:index.php?controller=cart&act=order_complete');
                        }
                    }
                } else {
                    $error = '<h5 style="color: red; font-size: 17px; text-align: center;">Lỗi : Đặt hàng thất bại </h5>';
                }
            }
        }

    }

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

                if (isset($_GET['id_product']))
                {
                    $id_product = $_GET['id_product'];
                }
                if (isset($_POST['addcart']))
                {
                    if(!isset($_SESSION['my_cart'][$id_product]))
                    {
                        $_SESSION['my_cart'][$id_product] = 1 ;
                    } else
                    {
                        $_SESSION['my_cart'][$id_product] += 1 ;
                    }
                }
                if (isset($_COOKIE['login']))
                {
                    $user = $_COOKIE['login'];
                    $sql = "SELECT * FROM user WHERE user = '$user'";
                    $select_info_account = selectAll($sql);
                }

            require_once ('view/public/layout/cart.php');
            require_once ('view/public/layout/footer.php');
            break;
    }
?>

<!-- <p style="text-align: center;"></p> -->
<!--
<h5 style='color: red; font-size='16px';text-align: center;>Lỗi : Không được để trống</h5>"
<h5 style="color: red; font"></h5> -->
