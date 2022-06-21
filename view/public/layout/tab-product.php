<!-- START TAB PRODUCT -->


<div class="container container-tab-product">
    <h2 class="title">TẤT CẢ SẢN PHẨM</h2>
    <div class="tab-css">
        <?php
            foreach ($category as $value) {
        ?>
            <button class="tablink" onclick="openPage('<?php echo $value['name_category']; ?>', this, '#ff523b')" id="defaultOpen"><?php echo $value['name_category']; ?></button>
        <?php
            }
        ?>
    </div>

    <?php
        foreach ($category as $value) {
    ?>
    <div id="<?php echo $value['name_category'] ?>" class="tabcontent">
        <div class="row">
            <?php
                $id_category = $value['id_category'];
                $sql = "SELECT * FROM product WHERE id_category = $id_category LIMIT 10";
                $loadTabProduct = loadTabProduct($sql);
                foreach ($loadTabProduct as $loadTabProduct) {
            ?>
            <div class="col-md-15 col-xs-6">
                <div class="card box-shadow">
                    <img src="view/images/product/<?php echo $loadTabProduct['image_product'] ?>" style="width:100%; max-height: 159.11px; width: 165px;">
                    <p class="name-product"><?php echo $loadTabProduct['name_product'] ?></P></p>
                    <span class="price-new"><?php echo number_format($loadTabProduct['new_price_product']) .' đ' ?></span>
                    <span class="price-old"><strike><?php echo number_format($loadTabProduct['old_price_product']) .' đ' ?></strike></span>
                    <p class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </p>
                    <div class="btn-group button-product" role="group" aria-label="Basic example" style="display: flex;">
                        <form action="index.php?controller=cart&id_product=<?php echo $loadTabProduct['id_product'] ?>" method="post">
                            <input type="hidden" name="id_product" value="<?php echo $loadTabProduct['id_product'] ?>">
                            <input type="hidden" name="name_product" value="<?php echo $loadTabProduct['name_product'] ?>">
                            <input type="hidden" name="image_product" value="<?php echo $loadTabProduct['image_product'] ?>">
                            <input type="hidden" name="new_price_product" value="<?php echo $loadTabProduct['new_price_product'] ?>">
                            <button type="submit" style="border-right: 1px solid #eee;width: 100px;" name="addcart"><i class="fas fa-cart-plus"></i>
                            </button>
                        </form>
                        <a href="index.php?controller=detail&id_product=<?php echo $loadTabProduct['id_product'] ?>">
                            <button style="width: 100px;">Xem thêm</button>
                        </a>
                    </div>
                    </p>
                </div>
            </div>

            <?php
                }
            ?>
        </div>
    </div>
    <?php
        }
    ?>
    <a href="index.php?controller=product"><button class="see_more" type="button">Xem Thêm</button></a>
</div>
</div>
<!-- END TAB PRODUCT -->