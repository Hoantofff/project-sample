<!-- Post Section Begin -->
<section class="post spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Danh Mục Bài Post</h4>
                        <ul>
                            <?php foreach($category_post as $category): ?>
                                <li><a href="<?= BASE_URL ?>?act=category-post&id=<?= $category['id'] ?>"><?= $category['name'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="sidebar__item">
                        <div class="latest-post__text">
                            <h4>Bài Post mới</h4>
                            <div class="latest-post__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    <?php for ($i = 0; $i < 3; $i++): ?>
                                        <a href="<?= BASE_URL ?>?act=post-detail&id=<?= $postTop6Latest[$i]['id'] ?>" class="latest-post__item">
                                            <div class="latest-post__item__pic">
                                                <img src="<?= $postTop6Latest[$i]['image'] ?>" alt="">
                                            </div>
                                            <div class="latest-post__item__text">
                                                <h6><?= $postTop6Latest[$i]['title'] ?></h6>
                                                <span><?= number_format($postTop6Latest[$i]['price'], 0, ',', '.') ?> VNĐ</span>
                                            </div>
                                        </a>
                                    <?php endfor; ?>
                                </div>
                                <div class="latest-prdouct__slider__item">
                                    <?php for ($i = 3; $i < 6; $i++): ?>
                                        <a href="<?= BASE_URL ?>?act=post-detail&id=<?= $postTop6Latest[$i]['id'] ?>" class="latest-post__item">
                                            <div class="latest-post__item__pic">
                                                <img src="<?= $postTop6Latest[$i]['image'] ?>" alt="">
                                            </div>
                                            <div class="latest-post__item__text">
                                                <h6><?= $postTop6Latest[$i]['title'] ?></h6>
                                                <span><?= number_format($postTop6Latest[$i]['price'], 0, ',', '.') ?> VNĐ</span>
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

            <div class="col-lg-8 col-md-7">
                <div class="row">
                    <?php foreach($categoryPost as $category): ?>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="<?= $category['p_image'] ?>" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i> <?= $category['p_created_at'] ?></li>
                                </ul>
                                <h5><a href="<?= BASE_URL ?>?act=post-detail&id=<?= $category['p_id'] ?>"><?= $category['p_title'] ?></a></h5>
                                <p><?= $category['p_excerpt'] ?> </p>
                                <a href="<?= BASE_URL ?>?act=post-detail&id=<?= $category['p_id'] ?>" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="col-lg-12">
                        <div class="product__pagination blog__pagination">
                            <a href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
<!-- Post Section End -->