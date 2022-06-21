<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = (date("Y-m-d H:i:s"));

    if (isset($_COOKIE['login'])) {
        $id_user = $_COOKIE['login'];
    }
    if (isset($_GET['id_product'])) {
        $id_product = $_GET['id_product'];
    }
    if (isset($_POST['comment'])) {
        $content = $_POST['content'];
        $sql = "INSERT INTO comment (id_user,content,id_product,date_comment) VALUES ('$id_user','$content','$id_product','$date')";

        $insertComment = execute($sql);
        if ($insertComment) {
            $thongbao =  "Thành công";
        } else {
            $thongbao = "Thất bại";
        }
    }

?>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-sm-4">
            <?php
                foreach ($loadDetail as $loadImageDetail) {
            ?>
                <div class="mySlides" >
                    <div class="numbertext">1 / 6</div>
                    <img src="view/images/product/<?php echo $loadImageDetail['image_product'] ?>" width="100%"/>
                </div>

                <div class="mySlides">
                    <div class="numbertext">2 / 6</div>
                    <img src="view/images/product/<?php echo $loadImageDetail['images_2'] ?>" width="100%"/>
                </div>

                <div class="mySlides">
                    <div class="numbertext">3 / 6</div>
                    <img src="view/images/product/<?php echo $loadImageDetail['images_3'] ?>" width="100%"/>
                </div>

                <div class="mySlides">
                    <div class="numbertext">4 / 6</div>
                    <img src="view/images/product/<?php echo $loadImageDetail['images_4'] ?>" width="100%" />
                </div>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

                <!-- Thumbnail images -->
                <div class="row"  style="display: flex; justify-content: center;">
                    <div class="column">
                        <img class="demo cursor" src="view/images/product/<?php echo $loadImageDetail['image_product'] ?>" style="width:100%" onclick="currentSlide(1)" alt="The Woods">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="view/images/product/<?php echo $loadImageDetail['images_2'] ?>" style="width:100%" onclick="currentSlide(2)" alt="Cinque Terre">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="view/images/product/<?php echo $loadImageDetail['images_3'] ?>" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
                    </div>
                    <div class="column">
                        <img class="demo cursor" src="view/images/product/<?php echo $loadImageDetail['images_4'] ?>" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
                    </div>
                </div>
                <?php
                    }
                ?>
        </div>
        <div class="col-sm-4">
        <?php
            foreach ($loadDetail as $key => $value_loadDetail) {
                $id_category = $value_loadDetail['id_category'];
            ?>
            <h3>
                <?php echo $value_loadDetail['name_product'] ?>
            </h3>
            <span class="price-new" style="font-size: 17px;">
                <?php echo number_format($value_loadDetail['new_price_product']). ' đ' ?>
            </span>
            <span class="price-old" style="font-size: 14px;"><strike> <?php echo number_format($value_loadDetail['old_price_product']). ' đ' ?></strike></span>
            <p class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </p>
            <p style="margin: 20px 0px;"><?php echo $value_loadDetail['info_product'] ?>.</p>

            <div class="product-count">
                <form action="index.php?controller=cart&id_product=<?php echo $value_loadDetail['id_product'] ?>" method="post">
                    <input type="hidden" name="id_product" value="<?php echo $value_loadDetail['id_product'] ?>">
                    <input type="hidden" name="name_product" value="<?php echo $value_loadDetail['name_product'] ?>">
                    <input type="hidden" name="image_product" value="<?php echo $value_loadDetail['image_product'] ?>">
                    <input type="hidden" name="new_price_product" value="<?php echo $value_loadDetail['new_price_product'] ?>">
                    <button type="submit" name="addcart" class="see_more" style="float: left;">Mua ngay
                    </button>
                </form>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="box-about-product" style="border-radius: 0px;">
                <p><i class="fas fa-eye"></i> Lượt xem sản phẩm : <b><?php echo $value_loadDetail['view'] ?></b></p>
                <p><i class="fas fa-phone-volume call-product"></i> 033.4373.123 | Nhân viên hỗ trợ</p>
            </div>
            <div class="box-about-product" style="border-radius: 0px;">
                <u><p class="title-box">Thông tin máy</p></u>
                <p style="font-size: 14px;"><i class="fas fa-box"></i></i> Nguyên hộp, đầy đủ phụ kiện từ nhà sản xuất</p>
                <p style="font-size: 14px;"><i class="fab fa-algolia"></i> Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple Việt Nam. 1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Gia hạn bảo hành thời gian giãn cách </p>
            </div>
            <div class="box-about-product" style="border-radius: 0px;">
                <u><p class="title-box">Ưu đãi thêm</p></u>
                <p style="font-size: 14px;"><i class="fas fa-check-circle"></i> Tặng gói iCloud 50GB miễn phí 3 tháng</p>
                <p style="font-size: 14px;"><i class="fas fa-check-circle"></i> Tặng bảo hành 2 năm</p>
                <p style="font-size: 14px;"><i class="fas fa-check-circle"></i> Tặng eSim Thần Tám 79 Itel 1T Data khủng 90GB</p>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</div>


<div class="container main-detail" style="line-height: 1.6;">
        <div class="row">
            <div class="box-main">
                <div class="container mt-3" style="padding-right: 0px; padding-left: 0px; border: 1px solid #eee;">
                    <br>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" style="padding-left: 40px;">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home" style="color: #333 ; font-size: 20px; font-weight: 600;">Cấu Hình</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu1">Thông Tin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu2">Đánh Giá</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="container tab-pane active" style="width: 100%;"><br>
                            <h4 style="padding-left: 35px;"><ins>Thông Số Kĩ Thuật</ins></h4>
                            <ul>
                            <?php
                                foreach ($loadDetail as $key => $value_loadDetail) {
                                    $id_category = $value_loadDetail['id_category']; ?>
                                <li>
                                    <hr style="margin:13px 0px ">
                                    <span class="span1">Màn hình</span>
                                    <span class="span2" style="float: right;"><?php echo $value_loadDetail['screen'] ?></span>
                                </li>
                                <li>
                                    <hr style="margin:13px 0px ">
                                    <span class="span1">Hãng</span>
                                    <span class="span2" style="float: right;"><?php echo $value_loadDetail['type'] ?></span>
                                </li>
                                <li>
                                    <hr style="margin:13px 0px ">
                                    <span class="span1">Camera trước</span>
                                    <span class="span2" style="float: right;"><?php echo $value_loadDetail['front_camera'] ?></span>
                                </li>
                                <li>
                                    <hr style="margin:13px 0px ">
                                    <span class="span1">Camera sau</span>
                                    <span class="span2" style="float: right;"><?php echo $value_loadDetail['rear_camera'] ?></span>
                                </li>
                                <li>
                                    <hr style="margin:13px 0px ">
                                    <span class="span1">Chipset</span>
                                    <span class="span2" style="float: right;"><?php echo $value_loadDetail['cpu'] ?></span>
                                </li>
                                <li>
                                    <hr style="margin:13px 0px ">
                                    <span class="span1">Bộ nhớ trong</span>
                                    <span class="span2" style="float: right;"><?php echo $value_loadDetail['rom'] ?></span>
                                </li>
                                <li>
                                    <hr style="margin:13px 0px ">
                                    <span class="span1">Ram</span>
                                    <span class="span2" style="float: right;"><?php echo $value_loadDetail['ram'] ?></span>
                                </li>
                                <li>
                                    <hr style="margin:13px 0px ">
                                    <span class="span1">Thẻ nhớ</span>
                                    <span class="span2" style="float: right;"><?php echo $value_loadDetail['sdcard'] ?></span>
                                </li>
                                <li>
                                    <hr style="margin:13px 0px ">
                                    <span class="span1">Pin</span>
                                    <span class="span2" style="float: right;"><?php echo $value_loadDetail['battery'] ?></span>
                                </li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </div>
                        <div id="menu1" class="container tab-pane fade"><br>
                            <h4 style="padding-left: 35px;"><ins>Đánh giá chi tiết iPhone 13 Pro Max</ins></h4>
                            <p style="padding-left: 35px;">iPhone 13 Pro Max xứng đáng là một chiếc iPhone lớn nhất, mạnh mẽ nhất và có thời lượng pin dài nhất từ trước đến nay sẽ cho bạn trải nghiệm tuyệt vời, từ những tác vụ bình thường cho đến các ứng dụng chuyên nghiệp.</p>
                        </div>
                        <div id="menu2" class="container tab-pane fade"><br>
                            <div class="row">
                                <?php
                                    if (!isset($_COOKIE['login'])) {
                                        echo '<div style="text-align: center; font-size: 17px; color: #ff523b;">
                                        <p>Vui lòng đăng nhập để đánh giá sản phẩm !</p>
                                        <a href="index.php?controller=login">Đăng nhập tại đây</a>
                                    </div>';
                                    } else {
                                        ?>
                                        <div class="box">
                                            <div class="col-md-8" style="border: 1px solid #eee; border-radius: 5px; padding: 20px;">
                                                <div class="comment">
                                                    <p>Đánh giá sản phẩm</p>
                                                    <?php
                                                        if (isset($_GET['id_product'])) {
                                                            $id_product = $_GET['id_product'];
                                                        }
                                                        $sql = "SELECT * FROM comment WHERE id_product = '$id_product' ORDER BY id_comment DESC";
                                                        $showComment = selectAll($sql);

                                                        foreach ($showComment as $comment) {
                                                    ?>
                                                        <div class="comment2" style="border: 1px solid #eeeeee;border-radius: 5px;">
                                                            <div class="row">
                                                                <div class="col-md-1" style="margin-top: 10px;">
                                                                    <img src="https://www.focusedu.org/wp-content/uploads/2018/12/circled-user-male-skin-type-1-2.png" width="40px" style="border: 1px solid rgb(200, 200, 200); border-radius: 50%;">
                                                                </div>
                                                                <div class="col-md-9" style="margin-top: 10px;">
                                                                    <b style="margin-top: 20px;"><?php echo $comment['id_user'] ?></b> | <?php echo $comment['date_comment'] ?>
                                                                    <br>
                                                                    <p><?php echo $comment['content'] ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                    <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-3" style="border: 1px solid #eee; border-radius: 5px; padding: 20px;margin-left: 50px;">
                                                <form action="" method="post">
                                                    <div class="row">
                                                        <p style="margin-left: 65px;">Nhập bình luận</p>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="content"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <button class="see_more" name="comment">Bình luận</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- START DETAI PRODUCT -->



<div class="container container-product-new">
    <hr>
        <h2 class="title">SẢN PHẨM LIÊN QUAN</h2>
        <div class="row">
        <?php
            $loadOtherProduct = loadOtherProduct($id_category);
            foreach ($loadOtherProduct as $loadOtherProduct) {
        ?>
            <div class="col-md-15 col-xs-6">
                <div class="card box-shadow">
                    <img src="view/images/product/<?php echo $loadOtherProduct['image_product'] ?>" style="width:100%; max-height: 159.11px; width: 165px;">
                    <p class="name-product"><?php echo $loadOtherProduct['name_product'] ?></p>
                    <span class="price-new"><?php echo number_format($loadOtherProduct['new_price_product']) .'đ' ?></span>
                    <span class="price-old"><strike><?php echo number_format($loadOtherProduct['old_price_product']) ?></strike></span>
                    <p class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </p>

                    <div class="btn-group button-product" role="group" aria-label="Basic example" style="display: flex;">
                        <form action="index.php?controller=cart&id_product=<?php echo $loadOtherProduct['id_product'] ?>" method="post">
                            <input type="hidden" name="id_product" value="<?php echo $loadOtherProduct['id_product'] ?>">
                            <input type="hidden" name="name_product" value="<?php echo $loadOtherProduct['name_product'] ?>">
                            <input type="hidden" name="image_product" value="<?php echo $loadOtherProduct['image_product'] ?>">
                            <input type="hidden" name="new_price_product" value="<?php echo $loadOtherProduct['new_price_product'] ?>">
                            <button type="submit" style="border-right: 1px solid #eee;width: 100px;" name="addcart"><i class="fas fa-cart-plus"></i>
                            </button>
                        </form>
                        <a href="index.php?controller=detail&id_product=<?php echo $loadOtherProduct['id_product'] ?>">
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







<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }
</script>