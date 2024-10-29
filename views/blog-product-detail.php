<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?= BASE_URL ?>asset/client/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?= $product['c_name'] ?></h2>
                    <div class="breadcrumb__option">
                        <a href="<?= BASE_URL ?>">Home</a>
                        <a href="<?= BASE_URL ?>"><?= $product['c_name'] ?></a>
                        <span>Danh Mục <?= $product['c_name'] ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                            src="<?= $product['p_image'] ?>" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        <img data-imgbigurl="img/product/details/product-details-2.jpg"
                            src="<?= BASE_URL ?>asset/client/img/product/details/thumb-1.jpg" alt="">
                        <img data-imgbigurl="img/product/details/product-details-3.jpg"
                            src="<?= BASE_URL ?>asset/client/img/product/details/thumb-2.jpg" alt="">
                        <img data-imgbigurl="img/product/details/product-details-5.jpg"
                            src="<?= BASE_URL ?>asset/client/img/product/details/thumb-3.jpg" alt="">
                        <img data-imgbigurl="img/product/details/product-details-4.jpg"
                            src="<?= BASE_URL ?>asset/client/img/product/details/thumb-4.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3><?= $product['p_title'] ?></h3>
                    <!-- <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div> -->
                    <div class="product__details__price"><?= number_format($product['p_price'], 0, ',', '.') ?> VNĐ</div>
                    <p><?= $product['p_description'] ?></p>
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text" value="1">
                            </div>
                        </div>
                    </div>
                    <a href="#" class="primary-btn">Thêm Vào Giỏ Hàng</a>
                    <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                    <ul>
                        <li><b>Trạng Thái</b> <span><?php echo (int)$product['p_quantity'] > 0 ? 'Còn Hàng' : 'Hết hàng' ?></span></li>

                        <li><b>Trọng Lượng</b> <span><?= $product['p_weight'] ?></span></li>
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Comment -->
            <!-- Comment Section Begin -->
            <section class="comments-section my-5" style="width: 100%; margin: 0 auto;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-lg-10">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <h4 class="mb-4">Bình Luận</h4>
                                    <!-- Existing Comments -->
                                    <?php foreach ($showComment as $comment): ?>
                                        <div class="d-flex mb-4">
                                            <img class="rounded-circle shadow-sm me-3" src="<?= $comment['u_image'] ?>" alt="avatar" width="60" height="60" />
                                            <div>
                                                <h6 class="fw-bold mb-1"><?= $comment['u_full_name'] ?></h6>
                                                <p class="small text-muted mb-2"><?= $comment['c_date_comment'] ?></p>
                                                <p class="mb-4">
                                                    <?= $comment['c_content'] ?>
                                                </p>
                                            </div>
                                        </div>
                                        <hr class="my-4" />
                                    <?php endforeach; ?>
                                    <!-- Add comment -->
                                    <!-- Comment Form -->
                                    <?php if (!empty($_SESSION['user_client']) && $_SESSION['user_client']): ?>
                                        <form action="" method="POST">
                                            <div class="card-footer bg-light border-0 py-4">
                                                <div class="d-flex">
                                                    <img class="rounded-circle shadow-sm me-3" src="<?= $_SESSION['user_client']['u_image'] ?>" alt="avatar" width="60" height="60" />
                                                    <div class="w-100">
                                                        <textarea class="form-control mb-3" rows="4" name="content" placeholder="Bình Luận Sản Phẩm."></textarea>
                                                        <button type="submit" class="btn btn-primary">Gửi Bình Luận</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    <?php else: ?>
                                        <a class="btn btn-success text-wight w-100" href="<?= BASE_URL ?>?act=login">Đăng nhập để bình luận</a>
                                    <?php endif; ?>
                                    <!-- End Comment Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Comment Section End -->

            <!-- End Comment -->
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Sản Phẩm Liên Quan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($ProductRelated as $product): ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="<?= $product['p_image'] ?>">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="<?php BASE_URL ?>?act=product-detail&id=<?= $product['p_id'] ?>"><?= $product['p_title'] ?></a></h6>
                            <h5><?= number_format($product['p_price'], 0, ',', '.') ?> VNĐ</h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Related Product Section End -->