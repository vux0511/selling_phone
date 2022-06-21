<div class="container" style="margin-top: 100px; margin-bottom: 50px;">

    <?php
        $thongbao = '';
        if (isset($_POST['update_password']))
            {
                $password = $_POST['password'];
                $password_new = $_POST['password_new'];
                $password_re = $_POST['password_re'];
                $user_update = $_COOKIE['login'];

                // Kiểm tra nếu rỗng
                if ($password == '' || $password_new == '' || $password_re == '' )
                {
                    $thongbao = "<p style='color: red;text-align: center; margin-top: 10px; font-weight: 500; font-size: 16px;'>Không được để trống!</p>";
                }
                else
                {
                    // Kiểm tra đúng pass cũ không
                    $sql_check = "SELECT * FROM user WHERE user = '$user_update'";
                    $checkpass = selectOne($sql_check);
                    $pass_old = $checkpass['password'];
                    if ($password != $pass_old)
                    {
                        $thongbao = "<p style='color: red;text-align: center; margin-top: 10px; font-weight: 500; font-size: 16px;'>Sai mật khẩu cũ , vui lòng nhập lại!</p>";
                    }
                    else
                    {
                        // Kiểm tra 2 pass mới trùng nhau không
                        if ($password_new == $password_re) {
                            $sql = "UPDATE user SET password ='$password_new' WHERE user = '$user_update'";
                            $update_pass = execute($sql);
                            if ($update_pass)
                            {
                                $thongbao = "<p style='color: green;text-align: center; margin-top: 10px; font-weight: 500; font-size: 16px;'>Đổi mật khẩu mới thành công!</p>";
                            }
                        } else {
                            $thongbao = "<p style='color: red;text-align: center; margin-top: 10px; font-weight: 500; font-size: 16px;'>Mật khẩu mới không trùng nhau!</p>";
                        }
                    }
                }

            }
    ?>

    <form action="" method="POST">
        <div class="row">
                <div class="col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="email" style="font-size: 15px; font-weight: 400; line-height: 1.5; color: #212529;">Mật khẩu cũ :</label>
                        <input type="password" class="form-control" id="email" placeholder="Nhập mật khẩu cũ" name="password" style="border: 1px solid #ced4da; border-radius: 0.25rem;">
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="email" style="font-size: 15px; font-weight: 400; line-height: 1.5; color: #212529;">Mật khẩu mới :</label>
                        <input type="password" class="form-control" id="email" placeholder="Nhập mật khẩu mới" name="password_new" style="border: 1px solid #ced4da; border-radius: 0.25rem;">
                    </div>
                </div>
                <div class="col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="email" style="font-size: 15px; font-weight: 400; line-height: 1.5; color: #212529;">Nhập lại mật khẩu mới :</label>
                        <input type="password" class="form-control" id="phone" placeholder="Nhập lại mật khẩu mới" name="password_re" style="border: 1px solid #ced4da; border-radius: 0.25rem;">
                    </div>
                </div>

                <input type="submit" class="see_more" name="update_password" value="Cập nhật" style="width: 150px; margin-top: 90px;border-radius: 4px;"></input>

                    <?php
                        if (isset($thongbao)) {
                            echo $thongbao;
                        }
                    ?>
                </div>
        </div>

  </form>
</div>