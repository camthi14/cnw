<main>
    <div class="container">
        <div class="wpb_wrapper">
            <div class="row">
                <div class="col-lg-6 col-12 warpper_left">
                    <div class="warpper_slider">
                        <?php if (isset($params['product_slick']) && !empty($params['product_slick'])) : ?>
                            <?php foreach ($params['product_slick'] as $item) : ?>
                                    <div class="blog_content-item blog_content-item2">
                                        <a href="<?= BASE_URL . '/product/detail/' . $item['id'] ?>" class="blog_content-link">
                                            <div class="content-img">
                                                <img src="<?= UPLOAD_PRODUCT_PATH . $item['thumb'] ?>" alt="">
                                            </div>
                                            <div class="bg_content-body">
                                                <div class="content-body">
                                                    <p class="content_sub">
                                                        <?= $item['name_cate'] ?>
                                                    </p>
                                                    <p class="content-title content-title2">
                                                        <?= $item['name'] ?>
                                                    </p>
                                                    <span>September 4, 2022</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                            <?php endforeach ?>
                        <?php endif ?>
                    </div>
                </div>
                <div class="col-lg-6 col-12 warpper_right">
                    <div class="row">
                        <div class="col-lg-6 col-12 mb-2 warpper_left">
                            <div class="blog_content-item blog_content-item2">
                                <a href="" class="blog_content-link">
                                    <div class="content-img">
                                        <img src="<?= PUBLIC_PATH . '/assets/img/Qu??i-????m.jpg' ?>" alt="">
                                    </div>
                                    <div class="bg_content-body">
                                        <div class="content-body">
                                            <p class="content_sub">
                                                V??n h???c n?????c ngo??i
                                            </p>
                                            <p class="content-title content-title2">
                                                Qu??i ????m - Chuy???n y??u ma hay ch??nh cu???c s???ng ?????i
                                            </p>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                        <div class="col-lg-6 col-12 mb-2 warpper_left">
                            <div class="blog_content-item blog_content-item2">
                                <a href="" class="blog_content-link">
                                    <div class="content-img">
                                        <img src="<?= PUBLIC_PATH . '/assets/img/nhat-ki-bi-lang-quen-review.jpg' ?>" alt="">
                                    </div>
                                    <div class="bg_content-body">
                                        <div class="content-body">
                                            <p class="content_sub">
                                                V??n h???c n?????c ngo??i
                                            </p>
                                            <p class="content-title content-title2">
                                                Nh???t k?? b??? l??ng qu??n, nh??ng t??nh ng?????i s??? c??n m??i
                                            </p>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-12 mt-2 warpper_left">
                            <div class="blog_content-item blog_content-item2">
                                <a href="" class="blog_content-link">
                                    <div class="content-img">
                                        <img src="<?= PUBLIC_PATH . '/assets/img/Reviewsach.net-chiec-la-cuoi-cung-cover.jpg' ?>" alt="">
                                    </div>
                                    <div class="bg_content-body">
                                        <div class="content-body">
                                            <p class="content_sub">
                                                V??n h???c n?????c ngo??i
                                            </p>
                                            <p class="content-title content-title2">
                                                Chi???c l?? cu???i c??ng
                                            </p>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                        <div class="col-lg-6 col-12 mt-2 warpper_left">
                            <div class="blog_content-item blog_content-item2">
                                <a href="" class="blog_content-link">
                                    <div class="content-img">
                                        <img src="<?= PUBLIC_PATH . '/assets/img/Featuredpicture-Tranh-bien-reviewsachonly-530x396.jpg' ?>" alt="">
                                    </div>
                                    <div class="bg_content-body">
                                        <div class="content-body">
                                            <p class="content_sub">
                                                V??n h???c n?????c ngo??i
                                            </p>
                                            <p class="content-title content-title2">
                                                Tranh bi???n - M???t trong nh???ng m???i t??nh n???c c?????i
                                            </p>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="main">
            <div class="row">
                <div class="col-lg-8 main_left">
                    <?php if (isset($params['category_product'])) : ?>
                        <?php foreach ($params['category_product'] as $cate_id => $item) :  ?>
                            <div class="line">
                                <p class="title"><?= $item['category']['name'] ?></p>
                            </div>

                            <?php if (isset($item['product'])) : ?>

                                <div class="row main_content">
                                    <?php if ($item['product'][0]) : ?>
                                        <div class="col-lg-6 main_content-left">
                                            <img src="<?= UPLOAD_PRODUCT_PATH . $item['product'][0]['thumb'] ?>" alt="">
                                            <a href="<?= BASE_URL . '/product/detail/' . $item['product'][0]['id'] ?>">
                                                <h3 class="main_title"><?= $item['product'][0]['name'] ?></h3>
                                            </a>
                                            <p class="main_time">August 9, 2022</p>
                                            <p class="main_sub"><?= $item['product'][0]['description'] ?></p>
                                        </div>
                                    <?php endif ?>

                                    <div class="col-lg-6 main_content-right">
                                        <div class="row">
                                            <?php unset($item['product'][0]); ?>

                                            <?php foreach ($item['product'] as $product) : ?>

                                                <div class="col-12 main_content-item">
                                                    <img src="<?= UPLOAD_PRODUCT_PATH . $product['thumb'] ?>" alt="">
                                                    <div class="main_content-info">
                                                        <a href="<?= BASE_URL . '/product/detail/' . $product['id'] ?>">
                                                            <h3 class="main_title"><?= $product['name'] ?></h3>
                                                        </a>
                                                        <p class="main_time"><?= $product['description'] ?></p>
                                                    </div>
                                                </div>

                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>

                            <?php endif; ?>

                        <?php endforeach ?>
                    <?php endif ?>
                </div>

                <div class="col-lg-4 main_right">
                    <div class="line">
                        <p class="title">Nh???ng b??i review s??ch t???ng h???p</p>
                    </div>
                    <div class="row main_content">
                        <div class="row">
                            <?php if (isset($params['product_review']) && !empty($params['product_review'])) : ?>
                                <?php foreach ($params['product_review'] as $item) : ?>
                                    <div class="col-12 main_content-item">
                                        <div class="main_content-info">
                                            <a href="<?= BASE_URL . '/product/detail/' . $item['id'] ?>">
                                                <h3 class="main_title"><?= $item['name'] ?></h3>
                                            </a>
                                            <p class="main_time">September 27, 2022</p>
                                        </div>
                                        <img src="<?= UPLOAD_PRODUCT_PATH . $item['thumb'] ?>" alt="">
                                    </div>
                                <?php endforeach ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>