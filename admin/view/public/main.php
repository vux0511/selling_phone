<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Trang Chủ</h1>

        <?php
            if(isset($_COOKIE['login'])) {
                echo "<h6>Xin chào : ".$_COOKIE['login']."</h6>";
            }
        ?>

        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Xuất File</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                Tuần Này
            </button>
        </div>
    </div>

    <?php
        $sql = "SELECT COUNT(*) FROM product";
        $numberProduct = selectRow($sql);
        $sql = "SELECT COUNT(*) FROM category";
        $numbercategory = selectRow($sql);

        // Lấy danh mục
        $sql = "SELECT * FROM category";
        $selectcategory = SelectAll($sql);

        $sql = "SELECT * FROM category";
        $selectcategory2 = SelectAll($sql);
    ?>

<div class="container">
    <p>Thống kê sản phẩm</p>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Danh Mục</th>
            <th>Số Lượng Sản Phẩm</th>
        </tr>
        </thead>
        <tbody>
            <?php
                foreach ($selectcategory as $value) {
                $id_category = $value['id_category'];
                // Đếm số lượng sản phẩm
                $sql = "SELECT COUNT(*) FROM product WHERE id_category = '$id_category'";
                $numberproduct2 = selectRow($sql);
            ?>
                <tr>
                    <td><?php echo $value['name_category'] ?></td>
                    <td><?php echo $numberproduct2 ?></td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>
</main>