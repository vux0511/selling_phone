<?php
    ob_start();

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

            if (isset($_POST['login'])) {
                $user = $_POST['user'];
                $password = $_POST['password'];

                $sql = "SELECT * FROM user WHERE user = '$user' AND password = '$password'";
                $check = selectOne($sql);
                if ($check) {
                    setcookie("login", $user, time()+36000, '/');
                    header('location:index.php?controller=home');
                    ob_end_flush();
                } else {
                    $error = "<h5 style='color: red; font-size='16px'>Lỗi : Sai tài khoản hoặc mật khẩu ! Vui lòng nhập lại</h5>";
                }
            }
            require_once ('view/public/layout/login.php');
            require_once ('view/public/layout/footer.php');
            break;
    }
?>