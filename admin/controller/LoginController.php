<?php

    if (isset($_GET["act"])) {
        $act = $_GET["act"];
    } else {
        $act = '';
    }

    $thongbao = '';
    $error = '';

    if(isset($_COOKIE['login_admin'])) {
        header('location: index.php?controller=home');
    } else {
        switch ($act) {
        // case 'logout': {
        //     require_once('./view/login/logout.php');
        // }
        default: {
            if (isset($_POST['login'])) {
                $user = $_POST['user'];
                $password = $_POST['password'];
                $remember = $_POST['remember'];

                $sql = "SELECT * FROM user WHERE user = '$user' AND password = '$password' AND lever = 'admin'";
                $check = selectOne($sql);
                if ($check) {
                    setcookie("login_admin", $user, time()+36000, '/');
                    header('location:?controller=home');
                } else {
                    $error = "<h6 style='color: red; font-size='16px'>Lỗi : Sai tài khoản hoặc mật khẩu ! Vui lòng nhập lại</h6>";
                }
            }
            require_once('./view/login/login.php');
        }
    }
    }
?>