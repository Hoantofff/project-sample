<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Danh Mục Sản Phẩm</h4>
                        <ul>
                            <?php foreach($categories as $category): ?>
                                <li><a href="<?= BASE_URL ?>?act=category-product&id=<?= $category['id'] ?>"><?= $category['name'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Sản Phẩm mới</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    <?php for ($i = 0; $i < 3; $i++): ?>
                                        <a href="<?= BASE_URL ?>?act=product-detail&id=<?= $productTop6Latest[$i]['id'] ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="<?= $productTop6Latest[$i]['image'] ?>" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?= $productTop6Latest[$i]['title'] ?></h6>
                                                <span><?= number_format($productTop6Latest[$i]['price'], 0, ',', '.') ?> VNĐ</span>
                                            </div>
                                        </a>
                                    <?php endfor; ?>
                                </div>
                                <div class="latest-prdouct__slider__item">
                                    <?php for ($i = 3; $i < 6; $i++): ?>
                                        <a href="<?= BASE_URL ?>?act=product-detail&id=<?= $productTop6Latest[$i]['id'] ?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="<?= $productTop6Latest[$i]['image'] ?>" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?= $productTop6Latest[$i]['title'] ?></h6>
                                                <span><?= number_format($productTop6Latest[$i]['price'], 0, ',', '.') ?> VNĐ</span>
                                            </div>
                                        </a>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">

                <div class="filter__item">
                </div>
                <div class="row">
                    <?php foreach ($categoryProduct as $product): ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="<?= $product['p_image'] ?>">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="<?= BASE_URL ?>?act=product-detail&id=<?= $product['p_id'] ?>"><?= $product['p_title'] ?></a></h6>
                                    <h5><?= $product['p_price'] ?></h5>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->