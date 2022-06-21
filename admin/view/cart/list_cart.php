<?php
    include ('view/public/navbar.php');

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <h2 style="margin-top: 30px; margin-bottom: 30px;">Quản Lý Đơn Hàng</h2>
    <div class="table-responsive">
        <form action="" method="post">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                    <tr>
                        <th class="th_id_bill">ID Đơn Hàng</th>
                        <th class="th_user">ID KH</th>
                        <th class="th_date">Ngày Đặt</th>
                        <th class="th_subtotal">Tổng Tiền</th>
                        <th class="th_fullname">Tên Người Đặt</th>
                        <th class="th_id_phone">Số Điện Thoại</th>
                        <th class="th_address">Địa Chỉ</th>
                        <th class="th_note">Ghi Chú</th>
                        <th class="th_status">Trạng Thái</th>
                        <th class="th_action_bill">Thao Tác</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($selectCart as $value) {
                    ?>
                    <tr>
                        <td><?php echo $value['id_bill'] ?></td>
                        <td><?php echo $value['id_user'] ?></td>
                        <td><?php echo $value['date_order'] ?></td>
                        <td><?php echo number_format($value['subtotal']) ?></td>
                        <td><?php echo $value['fullname'] ?></td>
                        <td><?php echo $value['phone'] ?></td>
                        <td><?php echo $value['address'] ?></td>
                        <td><?php echo $value['note'] ?></td>
                        <td><?php echo $value['status'] ?></td>
                        <td>
                            <a href="index.php?controller=cart&act=detail_bill&id_bill=<?php echo $value['id_bill'] ?>">Xem</a> -
                            <a href="index.php?controller=cart&act=delete&id_bill=<?php echo $value['id_bill'] ?>">Xóa</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </form>
    </div>
</main>


<?php
    include ('view/public/footer.php');
?>