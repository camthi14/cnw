<div class="container d-lg-flex">
    <div class="box-1 bg-light user">
        <div class="d-flex align-items-center mb-3">
            <img src="https://images.pexels.com/photos/4925916/pexels-photo-4925916.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" class="pic rounded-circle" alt="">
            <p class="ps-2 name">Oliur</p>
        </div>
        <div class="box-inner-1 pb-3 mb-3 ">
            <div class="d-flex justify-content-between mb-3 userdetails">
                <p class="fw-bold">Lightroom Presets</p>
                <!-- <p class="fw-lighter"><span class="fas fa-dollar-sign"></span>33.00+</p> -->
            </div>
            <div id="my" class="carousel slide carousel-fade img-details" data-bs-ride="carousel" data-bs-interval="2000">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#my" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#my" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#my" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://images.pexels.com/photos/100582/pexels-photo-100582.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.pexels.com/photos/258092/pexels-photo-258092.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" class="d-block w-100 h-100">
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.pexels.com/photos/7974/pexels-photo.jpg?auto=compress&cs=tinysrgb&dpr=2&w=500" class="d-block w-100">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#my" data-bs-slide="prev">
                    <div class="icon">
                        <span class="fas fa-arrow-left"></span>
                    </div>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#my" data-bs-slide="next">
                    <div class="icon">
                        <span class="fas fa-arrow-right"></span>
                    </div>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <p class="dis info my-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate quos ipsa
                sed officiis odio
            </p>
            <div class="radiobtn">
                <?php if (isset($params['cart_buy']) && !empty($params['cart_buy'])) : ?>
                    <?php foreach ($params['cart_buy'] as $item) : ?>

                        <input type="checkbox" hidden name="box" id="product-<?= $item['id'] ?>" checked>

                        <label for="product-<?= $item['id'] ?>" class="box py-2 first">
                            <div class="d-flex align-items-start">
                                <span class="circle"></span>
                                <div class="course">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="fw-bold">
                                            <?= $item['name'] ?>
                                        </span>
                                        <span class=""><?= number_format($item['sub_total']) . 'đ' ?></span>
                                    </div>
                                    <span><?= $item['quantity'] . ' x ' . number_format($item['price']) . 'đ' ?></span>
                                </div>
                            </div>
                        </label>

                    <?php endforeach ?>
                <?php endif ?>

            </div>
        </div>
    </div>
    <div class="box-2">
        <div class="box-inner-2">
            <div>
                <p class="fw-bold">Payment Details</p>
                <p class="dis mb-3">Thanh toán sản phẩm khi nhận hàng. Giao hàng là miễn phí</p>
            </div>

            <?php if (isset($params['error']) && !empty($params['error'])) : ?>
                <div class="alert alert-danger"><?= $params['error'] ?></div>
            <?php endif ?>

            <form action="<?= BASE_URL . '/checkout' ?>" method="post">
                <?php if (isset($params['user']) && !empty($params['user'])) : ?>
                    <div class="mb-3">
                        <p class="dis fw-bold mb-2">Địa chỉ</p>
                        <input class="form-control" type="text" value="<?= $params['user']['address'] ?? (isset($params['data']['address']) ? $params['data']['address'] : null) ?>" name='address' placeholder="Nhập địa chỉ">
                    </div>
                    <div>
                        <div class="my-3 cardname">
                            <p class="dis fw-bold mb-2">Tên khách hàng</p>
                            <input class="form-control" type="text" value="<?= $params['user']['fullname'] ?>" placeholder="Nhập tên">
                        </div>

                        <div class="my-3 cardname">
                            <p class="dis fw-bold mb-2">Số điện thoại</p>
                            <input class="form-control" type="text" name="phone" value="<?= $params['user']['phone'] ?? (isset($params['data']['phone']) ? $params['data']['phone'] : null) ?>" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="address">
                            <?php if (isset($params['cart_info']) && !empty(($params['cart_info']))) : ?>
                                <div class="d-flex flex-column dis">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <p><span>Quantity</span></p>
                                        <p><?= 'x' . $params['cart_info']['num_order'] ?></p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <p class="fw-bold">Total</p>
                                        <p class="fw-bold"><span class="fas fa-dollar-sign"></span><?= number_format($params['cart_info']['total']) . 'đ' ?></p>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-2">Pay<span class="fas fa-dollar-sign px-1"></span><?= number_format($params['cart_info']['total']) . 'đ' ?>
                                    </button>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                <?php endif ?>
            </form>
        </div>
    </div>
</div>