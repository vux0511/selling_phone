<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Đăng Nhập</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/floating-labels/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="view/public/css/login.css" rel="stylesheet">
</head>
<body>
    <form class="form-signin" method="POST">
        <div class="text-center mb-4">
            <img class="mb-4" src="https://logos.textgiraffe.com/logos/logo-name/Admin-designstyle-pastel-m.png" alt="" width="200px">
            <h1 class="h3 mb-3 font-weight-normal title_login">Đăng Nhập</h1>
            <p>Đăng nhập để có thể quản lý được Website của bạn</p>
            <?php
                if (isset($error)) {
                    echo $error;
                }
            ?>
        </div>
        <div class="form-label-group">
            <input type="text" class="form-control" placeholder="Email address" required autofocus name="user">
            <label for="inputEmail">Tài khoản</label>
        </div>
        <div class="form-label-group">
            <input type="password" class="form-control" placeholder="Password" required name="password">
            <label for="inputPassword">Mật khẩu</label>
        </div>
        <div class="checkbox mb-3">
            <label>
            <input type="checkbox" checked value="remember-me" name="remember"> Nhớ tài khoản
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Đăng Nhập</button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; Vux 2021</p>
    </form>



  </body>
</html>
