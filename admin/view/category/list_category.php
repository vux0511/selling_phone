<?php
    include ('view/public/navbar.php');

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <h2 style="margin-top: 30px; margin-bottom: 30px;">Quản Lý Danh Mục</h2>
    <div class="table-responsive">
        <form action="" method="post">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                    <tr>
                        <th class="th_id">#</th>
                        <th class="th_name">Tên Danh Mục</th>
                        <th class="th_action">Quản Lý</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $stt=1;
                        foreach ($data_category as $value) {
                    ?>
                    <tr>
                        <td><?php echo $stt++; ?></td>
                        <td><?php echo $value['name_category'] ?></td>
                        <td><a
                                href="index.php?controller=category&act=edit_category&id_category=<?php echo $value['id_category'] ?>">Sửa</a>
                            - <a onclick="return confirm('Bạn có chắc chắn xóa không ?')"
                                href="index.php?controller=category&act=delete_category&id_category=<?php echo $value['id_category'] ?>">Xóa</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="index.php?controller=category&act=add_category"><button type="button" class="btn btn-success"
                    style="margin-bottom: 50px;">Thêm
                    Danh Mục</button></a>
        </form>
    </div>
</main>


<?php
    include ('view/public/footer.php');
?>