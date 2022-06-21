<?php
    include ('view/public/navbar.php');
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <h2 style="margin-top: 30px; margin-bottom: 30px;">Quản Lý Sản Phẩm</h2>
    <?php
        if (isset($error)) {
            echo $error;
        }
        if (isset($thongbao)) {
            echo $thongbao;
        }
    ?>
    <div class="table-responsive">
        <form action="" method="post">
        <a href="index.php?controller=product&act=add_product"><button type="button" class="btn btn-success" style="margin-bottom: 30px;">Thêm Sản Phẩm</button></a>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th class="id_product">#</th>
                        <th class="name_product">Tên Danh Mục</th>
                        <th class="name_category">Danh Mục</th>
                        <th class="image_product">Ảnh</th>
                        <th class="hot_product">SP HOT</th>
                        <th class="old_price_product">Giá Cũ</th>
                        <th class="new_price_product">Giá Mới</th>
                        <th class="quantity_product">Số Lượng</th>
                        <th class="info_product">Thông Tin</th>
                        <th class="action_product">Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $stt=1;
                        foreach ($data_product as $value) {
                    ?>
                    <tr>
                        <td><?php echo $stt++; ?></td>
                        <td><?php echo $value['name_product'] ?></td>
                        <td><?php echo $value['id_category'] ?></td>
                        <td>
                            <img src="../view/images/product/<?php echo $value['image_product'] ?>" width="130px">
                        </td>
                        <td><?php echo $value['hot_product'] ?></td>
                        <td><?php echo $value['old_price_product'] ?></td>
                        <td><?php echo $value['new_price_product'] ?></td>
                        <td><?php echo $value['quantity_product']; ?></td>
                        <td><?php echo limitInfo($value['info_product']) ?></td>
                        <td><a
                                href="
                                index.php?controller=product&act=edit_product&id_product=<?php echo $value['id_product'] ?>">Sửa</a>
                            - <a onclick="return confirm('Bạn có chắc chắn xóa không ?')"
                                href="index.php?controller=product&act=delete_product&id_product=<?php echo $value['id_product'] ?>">Xóa</a>
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