<?php
    // echo "<pre>";
    // print_r($topproduct);
    // var_dump($topproduct);

?>
<div class="container container-product-new">
    <h2 class="title">SẢN PHẨM NỔI BẬT</h2>
    <div class="row">
    <?php
        foreach ($topproduct as $value) {
    ?>
        <div class="col-md-15 col-xs-6">
            <div class="card box-shadow">
                <img src="view/images/product/<?php echo $value['image_product'] ?>" style="width:100%; max-height: 159.11px; width: 165px;">
                <p class="name-product"><?php echo $value['name_product'] ?></p>
                <span class="price-new"><?php echo number_format($value['new_price_product']) .'đ' ?></span>
                <span class="price-old"><strike><?php echo number_format($value['old_price_product']) ?></strike></span>
                <p class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </p>
                <div class="btn-group button-product" role="group" aria-label="Basic example" style="display: flex;">
                    <form action="index.php?controller=cart&id_product=<?php echo $value['id_product'] ?>" method="post">
                        <input type="hidden" name="id_product" value="<?php echo $value['id_product'] ?>">
                        <input type="hidden" name="name_product" value="<?php echo $value['name_product'] ?>">
                        <input type="hidden" name="image_product" value="<?php echo $value['image_product'] ?>">
                        <input type="hidden" name="new_price_product" value="<?php echo $value['new_price_product'] ?>">
                        <button type="submit" style="border-right: 1px solid #eee;width: 100px;" name="addcart"><i class="fas fa-cart-plus"></i>
                        </button>
                    </form>
                    <a href="index.php?controller=detail&id_product=<?php echo $value['id_product'] ?>">
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
