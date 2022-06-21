<?php
    // if (!isset($_COOKIE['login'])) {
    //     echo '<p style="text-align: center; font-size: 22px; color: #ff523b; margin-top: 30px;">Vui lòng đăng nhập để xem giỏ hàng </p>';
    //     echo '<a href="index.php?controller=login"><p style="text-align: center; font-size: 25px; color: #ff523b; margin-top: 30px;"><i class="fas fa-arrow-right"></i> Ấn tại đây để <b>đăng nhập</b></p></a>';
    //     die;
    // }
    if (isset($thongbao)) {
        echo $thongbao;
    }
?>

<form action="" method="post">
    <div class="container">
        <hr>
        <table class="table table-hover" style="text-align: center;">
            <thead>
                <tr>
                    <th scope="col" style="text-align: center;">Tên Sản Phẩm</th>
                    <th scope="col" style="text-align: center;">Ảnh</th>
                    <th scope="col" style="text-align: center;">Số Lượng</th>
                    <th scope="col" style="text-align: center;">Giá</th>
                    <th scope="col" style="text-align: center;">Thành Tiền</th>
                    <th scope="col" style="text-align: center;">Xóa</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
        <?php
            $subtotal = 0;
            foreach ($_SESSION['my_cart'] as $key => $value) {
                $id_product = $key;
                $loadProductCart = loadProductCart($id_product);
                foreach ($loadProductCart as $loadProductCart) {
                    $total = $loadProductCart['new_price_product'] * $value;
                    $subtotal = $subtotal + $total; ?>
                    <tr>
                        <td><?php echo $loadProductCart['name_product'] ?></td>
                        <td>
                            <img src="view/images/product/<?php echo $loadProductCart['image_product'] ?>" width="100px">
                        </td>
                        <td>
                            <input class="input-detail" type="number" name="" value="<?php echo  number_format($value) ; ?>" min="1" style="border: 1.7px solid #ddd;border-radius: 5px;text-align: center;padding: 0.45rem 0.8rem;outline: 0; margin-right: 0.2rem;
                            margin-bottom: 1rem; width: 70px;cursor: pointer;height: 40px; margin-top: 0px;">
                        </td>
                        <td><?php echo number_format($loadProductCart['new_price_product']) .' đ'?></td>
                        <td><?php echo number_format($total) .' đ'?></td>
                        <td><a href="index.php?controller=cart&act=delete_cart&id_product=<?php echo $id_product ?>">Xóa</a></td>

                        <!-- Input Hidden -->
                        <input type="hidden" name="id_product" value="<?php echo $key ?>">

                    </tr>

                <?php
                }
            } ?>
                <tr>
                    <td colspan="6" style="text-align: center; padding-top: 15px;">
                        <b>Tổng Tiền</b> : <?php echo number_format($subtotal) .' đ' ?>
                    </td>
                </tr>
            </tbody>
        </table>
    <!-- Thanh toán -->
        <div class="row">
            <?php
                if (isset($_COOKIE['login'])) {
                    foreach ($select_info_account as $value) {
            ?>
            <div class="col-md-12" style="border: 1px solid #ddd; border-radius: 10px; padding: 10px;">
                <h3 style="color: #ff523b; font-size: 20px; padding-left: 20px;">THÔNG TIN THANH TOÁN</h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="row" style="padding: 10px 0px;">
                                <label for="exampleInputEmail1">Họ và tên</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên của bạn" name="fullname" value="<?php echo $value['fullname'] ?>">
                            </div>
                            <div class="row" style="padding: 10px 0px;">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php echo $value['email'] ?>">
                            </div>
                            <div class="row" style="padding: 10px 0px;">
                                <label for="exampleInputEmail1">Số điện thoại</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="phone" value="<?php echo $value['phone_user'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row" style="padding: 10px 0px;">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="address" value="<?php echo $value['address_user'] ?>">
                        </div>
                        <div class="row" style="padding: 10px 0px;">
                            <label for="exampleFormControlTextarea1">Ghi chú ( nếu có )</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="note"></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <ul>
                            <br>
                            <li>
                                <span class="span1"><b>Giảm giá</b></span><span class="span3">0%</span>
                            </li>
                            <hr style="border: 0.05rem solid rgb(224, 223, 223); margin: 10px 0px; ">
                            <li>
                                <span class="span1"><b>Vận Chuyển</b></span><span class="span3">50.000 VND</span>
                            </li>
                            <hr style="border: 0.05rem solid rgb(224, 223, 223); margin: 10px 0px; ">
                            <li>
                                <span class="span1"><b>VAT</b></span><span class="span3">0 VND</span>
                            </li>
                            <hr style="border: 0.05rem solid rgb(224, 223, 223); margin: 10px 0px; ">
                            <li>
                                <span class="span1"><b>Tổng tiền </b></span><span class="span3"><?php echo number_format($subtotal + 50000) ?></span>
                                <input type="hidden" value="<?php echo $subtotal + 50000 ?>" name="subtotal">
                            </li>
                            <hr style="border: 0.05rem solid rgb(224, 223, 223); margin: 10 0px; ">
                        </ul>
                        <br>
                        <input type="submit" class="see_more" name="buy_product" value="Đặt Hàng"></input>
                        <?php
                            if (isset($error)) {
                                echo $error;
                            }
                        }
                        }
                        else
                        {
                            echo '<div class="col-md-12" style="border: 1px solid #ddd; border-radius:  10px; padding: 10px;">
                                    <h3 style="color: #ff523b; font-size: 20px; text-align: center;">ĐĂNG NHẬP ĐỂ ĐẶT HÀNG</h3>
                                    <br>
                                    <h4 style="color: #ff523b; font-size: 18px; text-align: center;">ĐĂNG NHẬP <a href="index.php?controller=login" style="color: #ff523b;"><u>TẠI ĐÂY</u></a></h4>
                                    ';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

