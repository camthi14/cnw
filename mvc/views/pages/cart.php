<section class="h-100 gradient-custom">
    <div class="container py-5">
        <div class="row d-flex justify-content-center my-4">
            <div class="col-md-8">
                <div class="card mb-4">

                    <div class="card-header py-3">
                        <h5 class="mb-0">Cart - <?= isset($params['buy']) ? count($params['buy']) : 0 ?> items</h5>
                    </div>

                    <div class="card-body">


                        <!-- Single item -->

                        <?php if (isset($params['buy']) && !empty($params['buy'])) : ?>
                            <?php foreach ($params['buy'] as $item) : ?>
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                        <!-- Image -->
                                        <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                            <img src="<?= UPLOAD_PRODUCT_PATH . $item['thumb'] ?>" class="w-100" />
                                            <a href="">
                                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                            </a>
                                        </div>
                                        <!-- Image -->
                                    </div>

                                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                        <!-- Data -->
                                        <a class="text-muted" href="<?= BASE_URL . '/product/detail/' . $item['id'] ?>">
                                            <p><strong><?= $item['name'] ?></strong></p>
                                        </a>

                                        <form method="post" action="<?= BASE_URL . '/cart/delete' ?>">
                                            <input type="text" name="id" value="<?= $item['id'] ?>" hidden>
                                            <button type="submit" class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip" title="Remove item">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        <!-- Data -->
                                    </div>

                                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                        <!-- Quantity -->
                                        <div class="d-flex mb-4 m-auto" style="max-width: 100px">
                                            <input id="form1" min="1" max="10" data-id="<?= $item['id'] ?>" name="quantity" value="<?= $item['quantity'] ?>" type="number" class="bg-secondary text-white form-control m-0 input-sm text-center" />

                                        </div>
                                        <!-- Quantity -->

                                        <!-- Price -->
                                        <p class="text-start text-md-center">
                                            <strong><?= number_format($item['sub_total']) . ' đ' ?></strong>
                                        </p>
                                        <!-- Price -->
                                    </div>
                                </div>

                                <hr class="my-4" />

                            <?php endforeach ?>
                        <?php endif ?>
                        <!-- Single item -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Summary</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                Total Products
                                <span class="num_order">x <?= isset($params['info']) && !empty($params['info']) ? $params['info']['num_order'] : 0 ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Shipping
                                <span>Free ship</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Total amount</strong>
                                    <strong>
                                        <p class="mb-0">(including VAT)</p>
                                    </strong>
                                </div>
                                <span><strong class="total"><?= isset($params['info']) && !empty($params['info']) ? number_format($params['info']['total']) . ' đ' : 0 ?></strong></span>
                            </li>
                        </ul>
                        <a href="<?= BASE_URL . '/checkout' ?>" type="button" class="btn btn-primary btn-lg btn-block">
                            Go to checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>