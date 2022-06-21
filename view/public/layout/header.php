<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vuxxxxxxx</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700&family=Roboto+Slab:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="view/public/css/style.css">

</head>

<body>

    <nav class="navbar navbar-inverse" id="myHeader" style="border: none;">
        <div class="container-fluid navbar-top hidden-mobile">
            <div class="container ">
                <div class="row">
                    <div class="col-sm-4 hidden-mobile">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="https://static.wixstatic.com/media/a44461_6f52bf5c4b174c05a8704b6faf25c167~mv2.gif"
                                    width="40px">
                            </div>
                            <p style="font-size: 14px;">Cửa hàng mua bán điện thoại uy tín chất lượng hàng đầu Việt Nam
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-8 hidden-mobile">
                        <div class="row">
                            <div class="col-sm-4 col-xs-4">
                                <div class="row" style="border-right: 2px solid #eeeeee;">
                                    <div class="col-sm-1" style="font-size: 19px; padding-top: 6px;">
                                        <i class="fas fa-phone-volume" style="color: #ff523b;"></i>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            Gọi mua hàng
                                        </div>
                                        <div class="row" style="font-weight: bold;">
                                            033.4373.123
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-4">
                                <a href="">
                                    <div class="row" style="border-right: 2px solid #eeeeee;">
                                        <div class="col-sm-1" style="font-size: 19px; padding-top: 6px;">
                                            <i class="fas fa-map-marker-alt" style="color: #ff523b;"></i>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="row" style="padding-top: 8px; font-size: 15px; color: #212529;">
                                                Cửa hàng gần bạn
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4 col-xs-4">
                                <a href="">
                                    <div class="row" style="border-right: 2px solid #eeeeee;">
                                        <div class="col-sm-1" style="font-size: 19px; padding-top: 6px;">
                                            <i class="fas fa-shipping-fast" style="color: #ff523b;"></i>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="row" style="padding-top: 8px; font-size: 15px; color: #212529;">
                                                Tra cứu đơn hàng
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="min-height: 75px;padding-top: 12px;background-color: #ff523b;">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php" style="color: white;font-size: 25px;">VT-Phone</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php?controller=home">Trang Chủ</a></li>
                        <li><a href="index.php?controller=product">Sản Phẩm</a></li>
                        <li><a href="index.php?controller=about">Thông Tin</a></li>
                        <li><a href="index.php?controller=contact">Liên Hệ</a></li>
                        <li><a href="index.php?controller=cart"><i class="fas fa-shopping-cart"></i></a></li>
                        <!-- dropdown icon login -->
                        <div class="dropdown" style="color: #fff;">
                            <li style="color: #fff;">
                                <button class="dropbtn"><i class="fas fa-user"></i></button>
                                <div class="dropdown-content"
                                    style="font-size: 16px;color: #fff;padding: 7px 0px;text-decoration: none;text-align: center;">
                                    <?php
                                            if (isset($_COOKIE['login'])) {
                                        ?>

                                    <a href="index.php?controller=account&act=account" style="font-size: 16px;">Cập nhật
                                        tài khoản</a>
                                    <hr style="margin: 0px;">
                                    <a href="index.php?controller=account&act=update_password"
                                        style="font-size: 16px;">Đổi mật khẩu</a>
                                    <hr style="margin: 0px;">
                                    <a href="index.php?controller=logout" style="font-size: 16px;">Đăng xuất</a>
                                    <?php
                                            } else {
                                                echo '<a href="index.php?controller=login">Đăng nhập</a>
                                                    <hr style="padding: 0px; margin: 0px;font-size: 26px;">
                                                    <a href="index.php?controller=register">Đăng ký</a>
                                                    <hr style="padding: 0px; margin: 0px;">';
                                            }
                                        ?>
                                </div>
                            </li>
                        </div>
                    </ul>


                </div>
            </div>
        </div>
    </nav>