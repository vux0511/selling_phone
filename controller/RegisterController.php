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

            if (isset($_POST['register'])) {
                $user = $_POST['user'];
                $password = $_POST['password'];

                if ($user == '' || $password == '') {
                    $error = "<h5 style='color: red; font-size='16px'>Lỗi : Không được để trống !</h5>";
                }

                $sql = "SELECT * FROM user WHERE user = '$user'";
                $checkuser = selectOne($sql);
                if ($checkuser) {
                    $error = "<h4 style='color: red; font-size='16px'>Lỗi : Tài khoản này đã tồn lại . <br> Vui lòng thử tài khoản khác </h5>";
                } else {
                    $insertUser = insertUser($user, $password);
                    $thongbao = "<h4 style='color: green; font-size='16px'>Đăng kí thành công. Vui lòng đăng nhập lại ! </h4>";
                }
            }
            require_once ('view/public/layout/register.php');
            require_once ('view/public/layout/footer.php');
            break;
    }
?>