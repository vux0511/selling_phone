<?php
    include ('view/public/navbar.php');

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <h2 style="margin-top: 30px; margin-bottom: 30px;">Quản Lý Đơn Hàng</h2>

    <div class="row">
        <?php
            if (isset($thongbao)) {
                echo $thongbao;
            }
        ?>
    </div>
    <div class="table-responsive">
        <form action="" method="post">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                    <tr>
                        <th class="th_id_bill">Tên Sản Phẩm</th>
                        <th class="th_user">Ảnh Sản Phẩm</th>
                        <th class="th_date">Đơn Giá</th>
                        <th class="th_subtotal">Số Lượng</th>
                        <th class="th_fullname">Thành Tiền</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($selectDetailBill as $value) {
                            $id_product = $value['id_product'];

                            $sql = "SELECT * FROM product WHERE id_product = '$id_product'";
                            $selectBill = selectOne($sql);

                            $sql = "SELECT * FROM bill WHERE id_bill = '$id_bill'";
                            $selectBill0 = selectOne($sql);
                            // var_dump($selectBill);
                            // die;
                    ?>
                    <tr>
                        <td><?php echo $selectBill['name_product'] ?></td>
                        <td>
                            <img src="view/uploads/image_products/<?php echo $selectBill['image_product'] ?>" width="130px">
                        </td>
                        <td><?php echo number_format($selectBill['new_price_product']) ?></td>
                        <td><?php echo $value['quantity'] ?></td>
                        <td><?php echo number_format(($selectBill['new_price_product'] * $value['quantity'])) ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <div class="row" style="margin-top: 50px;">
                <form method="post">
                    <div class="col-md-2">
                        <select class="form-control" id="exampleFormControlSelect1" name="status">
                            <option value="wait"
                                <?php
                                    if ($selectBill0['status'] == 'wait') {
                                        echo "selected";
                                    }
                                ?>
                            >Chờ xác nhận</option>
                            <option value="shiping"
                                <?php
                                    if ($selectBill0['status'] == 'shipping') {
                                        echo "selected";
                                    }
                                ?>
                            >Đang giao hàng</option>
                            <option value="delivered"
                                <?php
                                    if ($selectBill0['status'] == 'delivered') {
                                        echo "selected";
                                    }
                                ?>
                            >Đã giao hàng</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <a href="index.php?controller=cart&act=update&id_bill=<?php echo $value['id_bill'] ?>"><button type="submit" class="btn btn-success" style="margin-bottom: 50px;" name="update">Sửa trạng thái</button></a>
                    </div>
                </form>
            </div>
        </form>
    </div>
</main>


<?php
    include ('view/public/footer.php');
?>