<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                <?php foreach ($categories as $category): ?>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="<?= $category['image'] ?>">
                            <h5><a href="<?= BASE_URL ?>?act=category-product&id=<?= $category['id'] ?>"><?= $category['name'] ?></a></h5>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản Phẩm Tiện Lợi</h2>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            <?php foreach ($productRand as $product): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 ">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?= $product['image'] ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="<?php BASE_URL ?>?act=product-detail&id=<?= $product['id'] ?>"><?= $product['title'] ?></a></h6>
                            <h5><?= number_format($product['price'], 0, ',', '.') ?> VNĐ</h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="<?= BASE_URL ?>asset/client/img/banner/banner-1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="<?= BASE_URL ?>asset/client/img/banner/banner-2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Sản Phẩm Mới Nhất</h4>
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
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Top Sản Phẩm</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <?php for ($i = 0; $i < 3; $i++): ?>
                                <a href="<?= BASE_URL ?>?act=product-detail&id=<?= $productTop6Trending[$i]['id'] ?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?= $productTop6Trending[$i]['image'] ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?= $productTop6Trending[$i]['title'] ?></h6>
                                        <span><?= number_format($productTop6Trending[$i]['price'], 0, ',', '.') ?> VNĐ</span>
                                    </div>
                                </a>
                            <?php endfor; ?>
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <?php for ($i = 3; $i < 6; $i++): ?>
                                <a href="<?= BASE_URL ?>?act=product-detail&id=<?= $productTop6Trending[$i]['id'] ?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?= $productTop6Trending[$i]['image'] ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?= $productTop6Trending[$i]['title'] ?></h6>
                                        <span><?= number_format($productTop6Trending[$i]['price'], 0, ',', '.') ?> VNĐ</span>
                                    </div>
                                </a>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Review Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?= BASE_URL ?>asset/client/img/latest-product/lp-1.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?= BASE_URL ?>asset/client/img/latest-product/lp-2.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?= BASE_URL ?>asset/client/img/latest-product/lp-3.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?= BASE_URL ?>asset/client/img/latest-product/lp-1.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?= BASE_URL ?>asset/client/img/latest-product/lp-2.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="<?= BASE_URL ?>asset/client/img/latest-product/lp-3.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Product Section End -->

<!-- Blog Section Begin -->
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>From The Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($postRand as $post): ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="<?= $post['image'] ?>" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> <?= $post['created_at'] ?></li>
                            </ul>
                            <h5><a href="<?= BASE_URL ?>?act=post-detail&id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h5>
                            <p><?= $post['excerpt'] ?> </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Blog Section End -->